// validation.js

document.getElementById('donationForm').addEventListener('submit', function(event) {
    let valid = true;

    // Limpiar mensajes de error
    document.getElementById('nombreError').textContent = '';
    document.getElementById('correoError').textContent = '';
    document.getElementById('montoError').textContent = '';

    // Validar Nombre
    const nombre = document.getElementById('nombre').value;
    if (nombre.trim() === '') {
        document.getElementById('nombreError').textContent = 'El nombre es requerido.';
        valid = false;
    }

    // Validar Correo Electrónico
    const correo = document.getElementById('correo').value;
    if (correo.trim() === '') {
        document.getElementById('correoError').textContent = 'El correo electrónico es requerido.';
        valid = false;
    } else if (!/\S+@\S+\.\S+/.test(correo)) {
        document.getElementById('correoError').textContent = 'El correo electrónico no es válido.';
        valid = false;
    }

    // Validar Monto
    const monto = document.getElementById('monto').value;
    if (monto.trim() === '') {
        document.getElementById('montoError').textContent = 'El monto de la donación es requerido.';
        valid = false;
    } else if (isNaN(monto) || monto <= 0) {
        document.getElementById('montoError').textContent = 'El monto debe ser un número positivo.';
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});