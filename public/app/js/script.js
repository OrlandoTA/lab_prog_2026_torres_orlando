const barranavegacion = document.querySelector(".barra-navegacion");
const btnMenu = document.getElementById("btn-menu");
const navegacion = document.querySelector(".navegacion");


const miCuenta = document.getElementById("mi-cuenta-btn");
const submenu = document.querySelector(".menu-desplegable");

const modoOscuro = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");


const form = document.querySelector("form");

const btnEditar = document.getElementById("btn-editar");
const campos = document.querySelectorAll("input, select, .btn-guardar, .descripcion-producto, textarea, select, .btn-cancelar");
const btnCancelar = document.getElementById("btn-cancelar");
const btnEliminar = document.getElementById("btn-eliminar");
const btnEliminarProducto = document.getElementById("btn-eliminarProducto");


const contenedorBotones = document.getElementById('contenedor-botones');
const contenedorToast = document.getElementById('contenedor-toast');

/* Modo oscuro
modoOscuro.addEventListener("click", () => { 
    let body = document.body;
    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");
});
*/








/* Submenu */

miCuenta.addEventListener("click", (e) => {
    e.preventDefault();
    submenu.classList.toggle("activo");
});



/* Accion para habilitar los inputs y select 
if (btnEditar) {
    btnEditar.addEventListener("click", () => {
        campos.forEach(campo => {
            campo.disabled = false;
        });
    });
}
*/







