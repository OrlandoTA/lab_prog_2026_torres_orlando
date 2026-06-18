import { Itemservice } from './service.js';

//Variables globales
const inputCodigo = document.getElementById('codigo');
const inputNombre = document.getElementById('nombre');
const descripcion = document.getElementById('text-descripcion');
const inputPrecio = document.getElementById('input-precio');
const inputStock = document.getElementById('input-stock');

const mensajeExito = document.getElementById("mensaje-exitoso");
const form = document.querySelector('form');

const btnEditar = document.getElementById("btn-editar");
const campos = document.querySelectorAll("input, select, .btn-guardar, .descripcion-producto, textarea, select, .btn-cancelar");
const btnCancelar = document.getElementById("btn-cancelar");
const btnEliminar = document.getElementById("btn-eliminar");
const btnGuardar = document.getElementById('btn-guardarCambios');



//Variable para guardar el id del producto a actualizar
var currentItemId = null;

/**
 * Area para eventListeners
 */

/* Accion para deshabilitar campos */
if (btnCancelar) {
    btnCancelar.addEventListener("click", () => {

        itemController.resetForm();
    });
}

/* Accion para habilitar los inputs y select */
if (btnEditar) {
    btnEditar.addEventListener("click", () => {
        itemController.enableForm(true);
    });
}

/* Mensaje eliminar producto */
if (btnEliminar) {
    btnEliminar.addEventListener("click", async () => {


        if (confirm("¿Seguro que querés eliminar este producto?")) {

            //Se borra el producto
            await itemController.delete(currentItemId);


            //Se limpia el formulario
            itemController.resetForm();


            //Se oculta el mensaje de exito
            setTimeout(() => {
                mensajeExito.classList.add("oculto");
            }, 3000);

        }
    });
}

if (btnGuardar) {
    btnGuardar.addEventListener("click", async () => {
        
        if (currentItemId === null) {
            await itemController.save();
        } else {
            await itemController.update();
        }



        //Se limpia el formulario
        itemController.resetForm();

    });
}

//Se construye el objeto itemController
export const itemController = {
    load: async function (id) {

        currentItemId = id;

        const item = await Itemservice.load(id);

        //Validacion si existe el producto
        if (!item) {
            alert('Producto no encontrado');
            return;
        }


        //Se muestra los datos del producto

        inputNombre.value = item.nombre;
        inputCodigo.value = item.codigo;
        descripcion.value = item.descripcion;
        inputPrecio.value = item.precio;
        inputStock.value = item.stock;
    },

    save: async function () {
        let data = Object.fromEntries(new FormData(form));
        data.stock = parseInt(data.stock);
        data.precio = parseFloat(data.precio);

        await Itemservice.save(data);
    },

    update: async function () {
        let data = Object.fromEntries(new FormData(form));

        data.id = currentItemId;
        data.stock = parseInt(data.stock);
        data.precio = parseFloat(data.precio);


        await Itemservice.update(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el producto
        await Itemservice.delete(id);

        //Se actualiza la tabla
        this.list();

    },

    list: async function () {
        const items = await Itemservice.list({});
        console.table(items);
    },

    exportPDF: function () {
        const btnExportar = document.getElementById('btn-exportar');

        if (!btnExportar) return;

        //El boton se ejecuta si se hace click en el 
        btnExportar.addEventListener('click', () => {
            window.print();
        })

        btnExportar.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === '') {
                e.preventDefault();
                window.print();
            }
        })
    },

    resetForm: function () {
        //Se limpia el formulario
        form.reset();

        //Se deshabilitan los campos
        campos.forEach(campo => {
            campo.disabled = true;
        });

        //Se limpia el producto en edicion
        currentItemId = null;

        //Se restaura botones los botones
        this.enableForm(false);

    },

    enableForm: function (enabled) {

        campos.forEach(campo => {
            campo.disabled = !enabled;
        });
    },

};
