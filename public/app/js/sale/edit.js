import { customerService } from '../customer/service.js';
import { saleController } from './controller.js';
import { viewSale } from './view.js';


document.addEventListener('DOMContentLoaded', () => {
    viewSale.init();

let clientesCache = [];
let activeIndex = -1;

const input = document.getElementById("input-cliente");
const lista = document.getElementById("lista-clientes");
const hidden = document.getElementById("clienteId");

input.addEventListener("input", async () => {

    const texto = input.value.trim();

    if (texto.length < 2) {
        lista.innerHTML = "";
        return;
    }

    clientesCache = await customerService.search(texto);
    activeIndex = -1;

    viewSale.showSuggestions(clientesCache, activeIndex);
});

lista.addEventListener("click", (e) => {

    const item = e.target.closest(".clientes-item");
    if (!item) return;

    const id = item.dataset.id;
    const text = item.textContent;

    input.value = text;
    hidden.value = id;

    lista.innerHTML = "";
});

input.addEventListener("keydown", (e) => {

    if (!clientesCache.length) return;

    // ABAJO
    if (e.key === "ArrowDown") {
        activeIndex++;
        if (activeIndex >= clientesCache.length) activeIndex = 0;

        viewshow(clientesCache, activeIndex);
    }

    // ARRIBA
    if (e.key === "ArrowUp") {
        activeIndex--;
        if (activeIndex < 0) activeIndex = clientesCache.length - 1;

        viewshow(clientesCache, activeIndex);
    }

    // ENTER
    if (e.key === "Enter") {

        const selected = clientesCache[activeIndex];
        if (!selected) return;

        input.value = `${selected.apellido}, ${selected.nombres}`;
        hidden.value = selected.id;

        lista.innerHTML = "";
    }
});






    const btnEditar = document.getElementById('btn-editar');
    const btnGuardar = document.getElementById('btn-guardarCambios');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnEliminar = document.getElementById('btn-eliminar');
    const btnVolver = document.getElementById('btnVolver');

    if(btnVolver){
        btnVolver.addEventListener('click', ()=>{
            window.location.href = '?controller=sale&action=index';
        })
    }



    if(btnEditar){
        btnEditar.addEventListener('click', () =>{
            saleController.enableForm(true);
        });
    }
    


    // Obtener id desde la URL
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get('id'));

    // Cargar producto
    if (id > 0) {
        saleController.load(id);
    }

    btnCancelar.addEventListener('click', async () => {

        if (id > 0) {
            saleController.load(id);
        }

        saleController.enableForm(false);

    });


    const selectPagos = document.getElementById('select-pago');
    if (selectPagos) {
        selectPagos.addEventListener('mousedown', function(e) {
            var option = e.target;
            if (option.tagName === 'OPTION') {
                e.preventDefault();
                // Invertimos la selección de forma manual
                option.selected = !option.selected;
            }
        });

    } 

    btnGuardar.addEventListener("click", async (e) => {

        e.preventDefault();

        try { //Actualizar usuario
            await saleController.update();

            //SweetAlert
            Swal.fire({
                title: "Cambios guardados",
                text: "Producto actualizado correctamente",
                icon: "success",
                timer: 20000,
                showConfirmButton: true
            });
            } catch (error) {
                Swal.fire({
                    title: "Error",
                    text: error.message,
                    icon: "error"
                });
        }
        saleController.enableForm(false);

    });




    // ELIMINAR
    btnEliminar.addEventListener('click', async () => {
        try {

            await saleController.delete(id);

            Swal.fire({
                title: 'Producto eliminado',
                text: 'El producto fue eliminado correctamente',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });

            setTimeout(() => {
                window.location.href = 'index.php';
            }, 2000);

        } catch (error) {

            Swal.fire({
                title: 'Error',
                text: error.message,
                icon: 'error'
            });

        }

    });



});