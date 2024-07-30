document.addEventListener('DOMContentLoaded', () => {
    const logoutButton = document.getElementById('logoutButton');

    logoutButton.addEventListener('click', (event) => {
        event.preventDefault(); // Evita el comportamiento predeterminado del enlace

        const confirmLogout = confirm("¿Está seguro de que desea cerrar sesión?");
        if (confirmLogout) {
            fetch('logout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.href = "login.html";
                } else {
                    alert('Error al cerrar sesión. Por favor, inténtelo de nuevo.');
                }
            })
            .catch(error => {
                alert('Error de conexión. Por favor, inténtelo de nuevo.');
            });
        }
    });
});
