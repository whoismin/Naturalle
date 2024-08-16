//FUNÇÃO PARA MÁSCARA DE TELEFONE
function mascara(telefone) {


    // Verifica o comprimento do valor e aplica a formatação apropriada para travar o digito de telefone
    if (telefone.value.length == 1) {
        telefone.value = '(' + telefone.value;
    } else if (telefone.value.length == 3) {
        telefone.value = telefone.value + ')';
    } else if (telefone.value.length == 9) {
        telefone.value = telefone.value + '-';
    }
}

function consultarCEP() {
    const cepInput = document.querySelector("input[name=cep]");
    const cepValue = cepInput.value.replace(/[^0-9]+/, '');

    if (cepValue.length !== 8) {
        alert("CEP inválido. O CEP deve conter 8 dígitos numéricos.");
        return;
    }

    const url = `https://viacep.com.br/ws/${cepValue}/json/`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert("CEP não encontrado. Verifique o CEP digitado.");
            } else {
                document.querySelector('input[name=rua]').value = data.logradouro || '';
                document.querySelector('input[name=bairro]').value = data.bairro || '';
                document.querySelector('input[name=cidade]').value = data.localidade || '';
                document.querySelector('input[name=estado]').value = data.uf || '';
            }
        })
        .catch(error => {
            alert("Ocorreu um erro ao buscar informações do CEP. Por favor, tente novamente mais tarde.");
        });
}

const cepInput = document.querySelector("input[name=cep]");
cepInput.addEventListener('blur', consultarCEP);



// FUNÇÃO PARA VALIDAR CNPJ

function validarCNPJ(cnpj) {
    // Remover caracteres não numéricos
    cnpj = cnpj.replace(/[^\d]+/g, '');

    // Verificar se o CNPJ possui 14 dígitos
    if (cnpj.length !== 14) {
        throw new Error('CNPJ deve conter exatamente 14 dígitos.');
    }

    // Eliminar CNPJs inválidos conhecidos
    if (/^(.)\1*$/.test(cnpj)) {
        throw new Error('CNPJ inválido: Todos os dígitos são iguais.');
    }

    // Validar os dígitos verificadores
    const digitos = cnpj.split('').map(Number);
    const pesos1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    const pesos2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

    const calcularDV = (cnpj, pesos) => {
        let soma = 0;
        for (let i = 0; i < pesos.length; i++) {
            soma += cnpj[i] * pesos[i];
        }
        const resto = soma % 11;
        return resto < 2 ? 0 : 11 - resto;
    };

    const dv1 = calcularDV(digitos.slice(0, 12), pesos1);
    const dv2 = calcularDV(digitos.slice(0, 13), pesos2);

    if (dv1 !== digitos[12] || dv2 !== digitos[13]) {
        throw new Error('Dígitos verificadores do CNPJ não correspondem.');
    }

    return true;
}

const cnpjInput = document.querySelector("input[name=cnpj]");
cnpjInput.addEventListener('blur', () => {
    try {
        const cnpj = cnpjInput.value;
        validarCNPJ(cnpj);
        alert('CNPJ válido.');
    } catch (error) {
        alert(error.message);
    }
});