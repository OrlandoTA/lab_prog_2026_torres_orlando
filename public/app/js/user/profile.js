
import { view } from './view.js';
import { userController } from './controller.js';

document.addEventListener('DOMContentLoaded', async () => {

    const btnCambiarClave = document.getElementById('btn-guardarCambios');

    view.init();
    userController.profile();

    btnCambiarClave.addEventListener('click', ()=>{
        
         try {
                    userController.updatePass();
        
                    Swal.fire({
                        title: "Clave  cambiada",
                        text: "La contraseña se cambio correctamente.",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                    });
        
                    userController.cleanForm();
        
                } catch (error) {
        
                    Swal.fire({
                        title: "Error",
                        text: error.message ?? "No se pudo cambiar la contraseña.",
                        icon: "error"
                    });
        
                }
    })
    


})