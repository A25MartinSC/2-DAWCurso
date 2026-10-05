const numeroVolumen = document.getElementById('numeroVolumen');
const barraNivel = document.getElementById('barraNivel');
const botonParar = document.getElementById('botonParar');

let volumenActual = 0;
let enMovimiento = true;


const intervalo = setInterval(() => {
    if (enMovimiento) {
        volumenActual = Math.floor(Math.random() * 101);
        numeroVolumen.innerText = volumenActual;
        barraNivel.style.width = volumenActual + '%';
    }
}, 50);


botonParar.addEventListener('click', () => {
    if (enMovimiento) {
        enMovimiento = false;
        botonParar.innerText = 'Otra vez';
        botonParar.classList.add('reintentar');
    } else {
        enMovimiento = true;
        botonParar.innerText = 'Parar';
        botonParar.classList.remove('reintentar');
    }
});