
document.addEventListener('DOMContentLoaded', function () {
   const loginForm = document.getElementById('login-form');
   const emailInput = document.getElementById('email');
   const passInput = document.getElementById('pass');
   const errorMessage = document.getElementById('error-message');

   loginForm.addEventListener('submit', function (e) {
      e.preventDefault(); // Impede o envio padrão do formulário

      // Validação de email
      const email = emailInput.value.trim();
      if (!validateEmail(email)) {
         displayError('Email inválido');
         return;
      }

      // Validação de senha (mínimo de 8 caracteres)
      const pass = passInput.value.trim();
      if (pass.length < 8) {
         displayError('A senha deve ter pelo menos 8 caracteres');
         return;
      }

      // Se os campos estiverem corretos, você pode enviar o formulário
      loginForm.submit();
   });

   function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
   }

   function displayError(message) {
      errorMessage.textContent = message;
      errorMessage.style.display = 'block';
   }
});
