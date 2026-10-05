const boton = document.getElementById('botonDescarga');
const textoBoton = document.getElementById('textoBoton');

boton.addEventListener('click', () => {
    if (boton.classList.contains('descargando') || boton.classList.contains('completado')) return;

    boton.classList.add('descargando');

    setTimeout(() => {
        boton.classList.remove('descargando');
        boton.classList.add('completado');
        textoBoton.innerText = '¡Descargado! ✓';
        textoBoton.style.opacity = '1';
    }, 2500);
});