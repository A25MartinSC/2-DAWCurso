const ventana = document.getElementById('ventana');
const titulo = ventana.querySelector('.titulo');

let arrastrando = false;
let x = 0;
let y = 0;
let inicioX;
let inicioY;

titulo.addEventListener('mousedown', (e) => {
    arrastrando = true;
    inicioX = e.clientX - x;
    inicioY = e.clientY - y;
});

document.addEventListener('mousemove', (e) => {
    if (arrastrando) {
        x = e.clientX - inicioX;
        y = e.clientY - inicioY;
        ventana.style.transform = `translate(${x}px, ${y}px)`;
    }
});

document.addEventListener('mouseup', () => {
    arrastrando = false;
});