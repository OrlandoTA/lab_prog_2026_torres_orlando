import { saleController } from "./controller.js";

document.addEventListener('DOMContentLoaded', () => {

    saleController.resetForm();

    saleController.enableForm(true);
    const btnCrear = document.getElementById('btn-guardarCambios')

    btnCrear.addEventListener('click', async (e) =>{
         
        //Evita que se envie instantaneamente
            e.preventDefault();

            try {
            await saleController.save();
            } catch (error) {
                console.error(error);
            }
          

            //Mensaje de exito
            Swal.fire({
                title: "Venta creada",
                text: "You clicked the button!",
                icon: "success"
            });
            //Espera 2 segundos y luego envia el form
            setTimeout(() => {
                form.submit();
            }, 2000);
    })

    /*
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

    } */
});