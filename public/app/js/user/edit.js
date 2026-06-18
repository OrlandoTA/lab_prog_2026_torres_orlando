import { userController } from './controller.js';

document.addEventListener('DOMContentLoaded', () => {

    const btnEditar = document.getElementById('btn-editar');
    const btnGuardar = document.getElementById('btn-guardarCambios');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnEliminar = document.getElementById('btn-eliminar');

    // Obtener id desde la URL
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get('id'));

    // Cargar usuario
    if (id > 0) {
        await userController.load(id);
    }

    // Habilitar exportación PDF
    userController.exportPDF();


    btnGuardar?.addEventListener("click", async (e) => {

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


    });

    btnEditar?.addEventListener('click', () => {
        userController.enableForm(true);
    });


    //Se llama al metodo exportPDF() para exportar la tabla de alta
    userController.exportPDF();
    // CANCELAR
    btnCancelar?.addEventListener('click', async () => {

        if (id > 0) {
            await userController.load(id);
        }

        userController.enableForm(false);

    });

    // ELIMINAR
    btnEliminar?.addEventListener('click', async () => {

        const confirmar = confirm(
            '¿Seguro que desea eliminar este usuario?'
        );

        if (!confirmar) {
            return;
        }

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