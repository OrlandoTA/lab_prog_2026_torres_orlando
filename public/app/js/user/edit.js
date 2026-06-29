import { userController } from './controller.js';
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
            window.location.href = '?controller=item&action=index';
        })
    }

    if(btnEditar){
        btnEditar.addEventListener('click', () =>{
            userController.enableForm(true);
        });
    }

    // Obtener id desde la URL
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get('id'));

    // Cargar usuario
    if (id > 0) {
        userController.load(id);
    }

    btnCancelar.addEventListener('click', async () => {

        if (id > 0) {
            userController.load(id);
        }

        userController.enableForm(false);

    });

    btnGuardar.addEventListener("click", async (e) => {

        e.preventDefault();

        try { //Actualizar usuario
            await userController.update();

            //SweetAlert
            Swal.fire({
                title: "Cambios guardados",
                text: "Usuario actualizado correctamente",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        } catch (error) {
            Swal.fire({
                title: "Error",
                text: error.message,
                icon: "error"
            });
        }
        userController.enableForm(false);

    });




    // ELIMINAR
    btnEliminar.addEventListener('click', async () => {
        try {

            await userController.delete(id);

            Swal.fire({
                title: 'Usuario eliminado',
                text: 'El usuario fue eliminado correctamente',
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