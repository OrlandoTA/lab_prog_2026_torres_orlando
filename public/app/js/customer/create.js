import { customerController } from "./controller.js"

document.addEventListener('DOMContentLoaded', () => {

    customerController.resetForm();

    customerController.enableForm(true);



    document.getElementById('btn-guardarCambios').onclick = (e)=>{
        customerController.save();
        //Evita que se envie instantaneamente
            e.preventDefault();

            //Mensaje de exito
            Swal.fire({
                title: "Cliente creado",
                text: "You clicked the button!",
                icon: "success"
            });
            //Espera 2 segundos y luego envia el form
            setTimeout(() => {
                form.submit();
            }, 2000);
    }
});