import { saleController } from "./controller.js";
import { customerController } from "../customer/controller.js";
import { customerService } from "../customer/service.js";
import { viewSale } from "./view.js";
import { itemService } from "../item/service.js";
import { itemController } from "../item/controller.js";



document.addEventListener('DOMContentLoaded', () => {

    let clientesCache = [];
    let activeIndex = -1;

    const input = document.getElementById("input-cliente");
    const lista = document.getElementById("lista-clientes");
    const hidden = document.getElementById("clienteId");

    input.addEventListener("input", async () => {

        const texto = input.value.trim();

        if (texto.length < 2) {
            lista.innerHTML = "";
            return;
        }

        clientesCache = await customerService.search(texto);
        activeIndex = -1;

        viewSale.showSuggestions(clientesCache, activeIndex);
    });

    lista.addEventListener("click", (e) => {

        const item = e.target.closest(".clientes-item");
        if (!item) return;

        const id = item.dataset.id;
        const text = item.textContent;

        input.value = text;
        hidden.value = id;

        lista.innerHTML = "";
    });




    //sUGESTIVO PARA PRODUCTO
    let productoCache = [];
   let activeIndexItem = -1;

    const inputProducto = document.getElementById("input-producto");
    const listaProducto = document.getElementById("lista-productos");
    const hiddenProducto = document.getElementById("productoId");

    inputProducto.addEventListener("input", async () => {

        const textoProducto = inputProducto.value.trim();

        if (textoProducto.length < 2) {
            listaProducto.innerHTML = "";
            return;
        }

        productoCache = await itemService.search(textoProducto);
        activeIndexItem = -1;

        viewSale.showProductSuggestions(productoCache, activeIndexItem);
    });

    listaProducto.addEventListener("click", (e) => {

        const item = e.target.closest(".productos-item");
        if (!item) return;

        const id = item.dataset.id;
        const textoProducto = item.textContent;

        inputProducto.value = textoProducto;
        hiddenProducto.value = id;

        listaProducto.innerHTML = "";
    });
    
    saleController.resetForm();

    saleController.enableForm(true);




    const btnCrear = document.getElementById('btn-guardarCambios');
        
    btnCrear.addEventListener('click', async (e) =>{
         
        //Evita que se envie instantaneamente
            e.preventDefault();

            await saleController.save();

          

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