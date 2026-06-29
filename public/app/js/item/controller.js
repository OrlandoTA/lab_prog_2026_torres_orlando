import { itemService } from './service.js';
import { view } from './view.js';

//Variable para guardar el id del Producto a actualizar
var currentItemId = null;

const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .descripcion-producto, textarea, select, .btn-cancelar')

const btnExportar = document.getElementById('btn-exportar');



//Se construye el objeto itemController
export const itemController = {

    load: async function (id) {

        currentItemId = id;
        
        const item =  await itemService.load(id);
        view.editItems(item);

    },

    save: async function () {
        let data = Object.fromEntries(new FormData(form));
        data.categorias = [...document.getElementById('categorias-select').selectedOptions]
        .map(opcion => opcion.value);


        await itemService.save(data);
    },

    update: async function () {

        let data = Object.fromEntries(new FormData(form));
        data.categorias = [...document.getElementById('categorias-select').selectedOptions]
        .map(opcion => opcion.value);
        data.id = currentItemId;

        await itemService.update(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el Producto
        await itemService.delete(id);

    },

    list: async (filters = {})=> {
        let items = await itemService.list(filters);
        view.listItems(items);

    },


    search: async function (text) {

        const items = await itemService.list({
            search: text
        });

        this.renderTable(items);

    },

    exportPDF: function () {
        if (!btnExportar) return;

        //El boton se ejecuta si se hace click en el 
        btnExportar.addEventListener('click', () => {
            window.print();
        })
    },

    resetForm: function () {
      
        //Se deshabilitan los campos
        campos.forEach(campo => {
            campo.disabled = true;
        });

        //Se limpia el Producto en edicion
        currentItemId = null;

        //Se restaura botones los botones
        this.enableForm(false);

    },

    enableForm: function (enabled) {
        
        campos.forEach(campo => {
            campo.disabled = !enabled;
        });
    },

    

}