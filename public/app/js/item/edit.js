import { itemController } from './controller.js';
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
            itemController.enableForm(true);
        });
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

    const btnExportar = document.getElementById('btn-exportar');
    btnExportar.addEventListener('click', ()=>{
        window.print();
    })


    // Obtener id desde la URL
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get('id'));

    // Cargar producto
    if (id > 0) {
        itemController.load(id);
    }

    btnCancelar.addEventListener('click', async () => {

        if (id > 0) {
            itemController.load(id);
        }

        itemController.enableForm(false);

    });

    btnGuardar.addEventListener("click", async (e) => {

        e.preventDefault();

        try { //Actualizar usuario
            await itemController.update();

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
        itemController.enableForm(false);

    });




    // ELIMINAR
    btnEliminar.addEventListener('click', async () => {
        try {

            

        
            Swal.fire({
            title: "Esta seguro que quiere eliminar?",
            text: "No sera posible revertir!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, borrar!"
            }).then((result) => {
                if (result.isConfirmed) Swal.fire({
                    title: "Eliminado!",
                    text: "El producto fue eliminado.",
                    icon: "success",
                   
                });
                await  itemController.delete(id)
            });

        } catch (error) {

            Swal.fire({
                title: 'Error',
                text: error.message,
                icon: 'error'
            });

        }

    });



});