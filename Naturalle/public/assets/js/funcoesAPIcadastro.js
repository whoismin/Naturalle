
// FUNÇÃO PARA MÁSCARA DE TELEFONE
function mascara(telefone) {


    // Verifica o comprimento do valor e aplica a formatação apropriada para travar o digito do telefone
    if (telefone.value.length == 1) {
        telefone.value = '(' + telefone.value;
    } else if (telefone.value.length == 3) {
        telefone.value = telefone.value + ')';
    } else if (telefone.value.length == 9) {
        telefone.value = telefone.value + '-';
    }
}

//FUNÇÃO BUSCADOR DE CEP
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


//FUNCÃO PARA VALIDAR CPF

function validarCPF(cpf) {
    // Remover caracteres não numéricos
    cpf = cpf.replace(/[^\d]+/g, '');

    // Verificar se o CPF possui 11 dígitos
    if (cpf.length !== 11) {
        throw new Error('CPF deve conter exatamente 11 dígitos.');
    }

    // Eliminar CPFs inválidos conhecidos
    if (/^(.)\1*$/.test(cpf)) {
        throw new Error('CPF inválido: Todos os dígitos são iguais.');
    }

    // Validar os dígitos verificadores
    const digitos = cpf.split('').map(Number);

    const calcularDV = (cpf, pesos) => {
        let soma = 0;
        for (let i = 0; i < pesos.length; i++) {
            soma += cpf[i] * pesos[i];
        }
        const resto = soma % 11;
        return resto < 2 ? 0 : 11 - resto;
    };

    const dv1 = calcularDV(digitos.slice(0, 9), [10, 9, 8, 7, 6, 5, 4, 3, 2]);
    const dv2 = calcularDV(digitos.slice(0, 10), [11, 10, 9, 8, 7, 6, 5, 4, 3, 2]);

   
    return true;
}

const cpfInput = document.querySelector("input[name=cpf]");
cpfInput.addEventListener('blur', () => {
    try {
        const cpf = cpfInput.value;
        validarCPF(cpf);
        alert('CPF válido.');
    } catch (error) {
        alert(error.message);
    }
});

//FUNÇÃO PARA VALIDAR SENHA

function validarSenha(senha) {
    // Verificar se a senha possui pelo menos 8 caracteres
    if (senha.length < 8) {
        throw new Error('Senha deve conter pelo menos 8 caracteres.');
    }

    // Verificar se a senha contém pelo menos uma letra maiúscula
    if (!/[A-Z]/.test(senha)) {
        throw new Error('Senha deve conter pelo menos uma letra maiúscula.');
    }

    // Verificar se a senha contém pelo menos uma letra minúscula
    if (!/[a-z]/.test(senha)) {
        throw new Error('Senha deve conter pelo menos uma letra minúscula.');
    }

    // Verificar se a senha contém pelo menos um número
    if (!/[0-9]/.test(senha)) {
        throw new Error('Senha deve conter pelo menos um número.');
    }

    // Verificar se a senha contém pelo menos um caractere especial
    if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(senha)) {
        throw new Error('Senha deve conter pelo menos um caractere especial.');
    }

    return true;
}

const senhaInput = document.querySelector("input[name=senha]");
senhaInput.addEventListener('blur', () => {
    try {
        const senha = senhaInput.value;
        validarSenha(senha);
        alert('Senha válida.');
    } catch (error) {
        alert(error.message);
    }
});

