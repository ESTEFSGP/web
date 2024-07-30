document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('loginForm');
    const validationMessagesContainer = document.getElementById('validationMessages');

    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Evita que se envíe el formulario

        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        let validationMessages = [];

        validationMessagesContainer.innerHTML = ''; // Limpia los mensajes previos

        if (!email) {
            validationMessages.push('Por favor, ingrese su correo electrónico.');
        } else if (!validateEmail(email)) {
            validationMessages.push('Por favor, ingrese un correo electrónico válido.');
        }

        if (!password) {
            validationMessages.push('Por favor, ingrese su contraseña.');
        }

        if (validationMessages.length > 0) {
            validationMessagesContainer.innerHTML = validationMessages.join('<br>');
        } else {
            const formData = new FormData(form);
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "admin.html";
                } else {
                    validationMessagesContainer.innerHTML = data.message;
                }
            })
            .catch(error => {
                validationMessagesContainer.innerHTML = 'Error de conexión. Por favor, inténtelo de nuevo.';
            });
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
