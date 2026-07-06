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