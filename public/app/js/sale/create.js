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
    let detalleVenta = [];
    let productoSeleccionado = null;
    const inputProducto = document.getElementById("input-producto");
    const listaProducto = document.getElementById("lista-productos");
    const hiddenProducto = document.getElementById("productoId");
    const inputCantidad = document.getElementById("input-cantidad");
    const btnAgregarProducto = document.getElementById("btn-agregarProducto");


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

    
    
    listaProducto.addEventListener('click', (e)=>{
        const item = e.target.closest(".productos-item");
        if (!item) return;

        const id = parseInt(item.dataset.id);

        productoSeleccionado = productoCache.find(p => p.id == id);

        inputProducto.value = productoSeleccionado.nombre;
        hiddenProducto.value = productoSeleccionado.id;

        listaProducto.innerHTML = "";

    });

   

    btnAgregarProducto.addEventListener("click", () => {

        if (!productoSeleccionado) {
            alert("Seleccione un producto");
            return;
        }

        const cantidad = parseInt(inputCantidad.value);

        //Se verifica que se agrege una cantidad valida
        if (isNaN(cantidad) || cantidad <= 0) {
            Swal.fire("Ingrese una cantidad válida");

            return;
        }

        //Se verifica que se agrege una cantidad valida
        if(cantidad > productoSeleccionado.stock){
            Swal.fire(`Solo hay ${productoSeleccionado.stock} unidades de este producto `);
            return;
        }

        const cantidadAgregada = detalleVenta.filter(d=> d.itemId == productoSeleccionado.id).reduce((total, d) => total + (d.cantidad) , 0);

        if(cantidad + cantidadAgregada > productoSeleccionado.stock){
            Swal.fire(`Solo queda ${productoSeleccionado.stock  - cantidadAgregada} unidades disponibles`);
            return;
        }

        detalleVenta.push({
            itemId: productoSeleccionado.id,
            nombre: productoSeleccionado.nombre,
            precio: productoSeleccionado.precio,
            cantidad: cantidad,
            subtotal: productoSeleccionado.precio * cantidad,
        });


        


        viewSale.tablaDetalle(detalleVenta);
        viewSale.totalVenta(detalleVenta);

        // limpiar
        productoSeleccionado = null;
        inputProducto.value = "";
        inputCantidad.value = null;
        hiddenProducto.value = "";

    });



    //METODO PARA BORRAR UN PRODUCTO DEL CARRITO

    const tbody = document.getElementById('detalle-venta'); 
    
    tbody.addEventListener("click", e => {
        const boton = e.target.closest(".btn-eliminar");

        if (!boton) return;

        const index = boton.dataset.index;

        detalleVenta.splice(index, 1);

        viewSale.tablaDetalle(detalleVenta);
        viewSale.totalVenta(detalleVenta);

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
        const venta =  Object.fromEntries(new FormData(form));
        venta.detalle = detalleVenta;

        await saleController.save(venta);
        
        //Mensaje de exito
        Swal.fire({
            title: "Venta creada",
            text: "La venta se creo con exito!",
            icon: "success"
        });
        

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