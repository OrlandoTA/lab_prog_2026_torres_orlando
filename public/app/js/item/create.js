import { itemController } from "./controller.js";

document.addEventListener('DOMContentLoaded', () => {

    itemController.resetForm();

    itemController.enableForm(true);

    document.getElementById('btn-guardarCambios').onclick = (e)=>{
        itemController.save();
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

    const selectCategorias = document.getElementById('categorias-select');
    if (selectCategorias) {
        selectCategorias.addEventListener('mousedown', function(e) {
            var option = e.target;
            if (option.tagName === 'OPTION') {
                e.preventDefault();
                // Invertimos la selección de forma manual
                option.selected = !option.selected;
            }
        });

    } 
});