import { itemService } from './service.js';
import { view } from './view.js';
import { viewSale } from '../sale/view.js';


//Variable para guardar el id del Producto a actualizar
var currentItemId = null;
const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .descripcion-producto, textarea, .btn-cancelar')

const btnExportar = document.getElementById('btn-exportar');

const input = document.querySelectorAll('input');
const select = document.querySelectorAll('select');
const textarea = document.querySelector('textarea')


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

    tablaDeVenta: async( filters = {}) =>{
        let items = await itemService.list(filters);
        
        viewSale.tablaDetalle(items);
    },

    search: async buscar => {
        const productos = await itemService.search(buscar);
        viewSale.showProductSuggestions(productos);
    },

  
    exportTablaPDF: function(idTabla) {

        const { jsPDF } = window.jspdf;

        const doc = new jsPDF("l", "mm", "a4");

        const titulo = document.querySelector(".titulo-modulo h1").innerText;

        doc.setFontSize(18);

        doc.text(titulo, 15, 15);

        doc.autoTable({
            html: idTabla,
            startY: 25
        });

        doc.save("archivo.pdf");

    },

   exportFormPDF(formId, titulo) {
        const { jsPDF } = window.jspdf;

        const doc = new jsPDF();

        const form = document.getElementById(formId);

        const elementos = form.querySelectorAll("input, select, textarea");

        let y = 20;

        doc.setFontSize(18);
        doc.text(titulo, 20, y);

        y += 15;

        elementos.forEach(campo => {

            if (
                campo.type === "button" ||
                campo.type === "submit" ||
                campo.type === "hidden"
            ) {
                return;
            }

            let textoLabel = "";

            const label = form.querySelector(`label[for="${campo.id}"]`);

            if (label) {
                textoLabel = label.textContent.replace("*", "").trim();
            } else {
                textoLabel = campo.name;
            }

            let valor = campo.value;

            if (campo.tagName === "SELECT") {
                valor = campo.options[campo.selectedIndex]?.text ?? "";
            }

            doc.setFontSize(11);

            doc.text(`${textoLabel}: ${valor}`, 20, y);

            y += 8;

            if (y > 270) {
                doc.addPage();
                y = 20;
            }

        });

        doc.save(`${titulo}.pdf`);

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

    cleanForm: function(){
        select.value = null;
        input.value = ""    ;
        textarea.value = "";
    }

    

}