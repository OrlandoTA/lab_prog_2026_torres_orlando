import { saleController } from './controller.js';
import { view } from './view.js';

document.addEventListener('DOMContentLoaded', () => {
    view.init();


    const btnEditar = document.getElementById('btn-editar');
    const btnGuardar = document.getElementById('btn-guardarCambios');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnEliminar = document.getElementById('btn-eliminar');
    const btnVolver = document.getElementById('btnVolver');

    if(btnVolver){
        btnVolver.addEventListener('click', ()=>{
            window.location.href = '?controller=customer&action=index';
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
                showConfirmButton: false
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