import { itemController } from "./controller.js";

document.addEventListener('DOMContentLoaded', () => {

    itemController.resetForm();

    itemController.enableForm(true);
    const btnCrear = document.getElementById('btn-guardarCambios');


    btnCrear.addEventListener('click', async (e) =>{
         
        try {

            await itemController.save();

            await Swal.fire({
                title: "Producto creado",
                text: "El producto se creó correctamente.",
                icon: "success",
                confirmButtonText: "Aceptar"
            });

            itemController.cleanForm();

        } catch (error) {

            Swal.fire({
                title: "Error",
                text: error.message ?? "No se pudo guardar el producto.",
                icon: "error"
            });

        }

    })

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