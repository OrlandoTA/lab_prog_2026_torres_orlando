import { userController } from "./controller.js"

document.addEventListener('DOMContentLoaded', () => {

    userController.resetForm();

    userController.enableForm(true);



    document.getElementById('btn-guardarCambios').onclick = (e)=>{
        userController.save();
        //Evita que se envie instantaneamente
            e.preventDefault();

            //Mensaje de exito
            Swal.fire({
                title: "Usuario creado",
                text: "You clicked the button!",
                icon: "success"
            });
            //Espera 2 segundos y luego envia el form
            setTimeout(() => {
                form.submit();
            }, 2000);
    }
});