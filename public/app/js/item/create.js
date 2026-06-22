import { itemController } from "./controller.js"

document.addEventListener('DOMContentLoaded', () => {

    itemController.resetForm();

    itemController.enableForm(true);


    //Alerta de usuario creado con exito
    document.querySelector('form').onclick = () => {
        const form = document.querySelector('form');

        form.addEventListener("submit", (e) => {

            //Evita que se envie instantaneamente
            e.preventDefault();

            //Mensaje de exito
            Swal.fire({
                title: "Producto creado",
                text: "You clicked the button!",
                icon: "success"
            });
            //Espera 2 segundos y luego envia el form
            setTimeout(() => {
                form.submit();
            }, 2000);
        });
    };

    document.getElementById('btn-guardarCambios').onclick = ()=>{
        itemController.save();
    }
});