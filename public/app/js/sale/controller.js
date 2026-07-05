import { saleService } from './service.js';
import { viewSale } from './view.js';
import { customerService } from '../customer/service.js';

//Variable para guardar el id del Producto a actualizar
var currentSaleId = null;

const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .btn-cancelar')

const btnExportar = document.getElementById('btn-exportar');




//Se construye el objeto saleController
export const saleController = {

    load: async function (id) {

        currentSaleId = id;
        
        const sale =  await saleService.load(id);
        viewSale.editSales(sale); 

    },

    save: async function (data) {
        await saleService.save(data);
    },

    update: async function () {

        let data = Object.fromEntries(new FormData(form));

        /*
        data.categorias = [...document.getElementById('categorias-select').selectedOptions]
        .map(opcion => opcion.value);*/
       
        data.id = currentSaleId;

        await saleService.update(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el Producto
        await saleService.delete(id);

    },

    list: async (filters = {})=> {
        let sales = await saleService.list(filters);
        viewSale.listSales(sales);//Cambiar por listSales

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
        currentSaleId = null;

        //Se restaura botones los botones
        this.enableForm(false);

    },

    enableForm: function (enabled) {
        
        campos.forEach(campo => {
            campo.disabled = !enabled;
        });
    },

    

}