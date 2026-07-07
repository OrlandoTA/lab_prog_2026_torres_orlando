import { userService } from './service.js';
import { view } from './view.js'

//Variable para guardar el id del usuario a actualizar
var currentUserId = null;

const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .descripcion-producto, textarea, select, .btn-cancelar')




//Se construye el objeto userController
export const userController = {

    load: async function (id) {

        currentUserId = id;
        
        const user =  await userService.load(id);
        view.editUser(user);
    },

    save: async function () {
        let data = Object.fromEntries(new FormData(form));
       
        await userService.save(data);
    },

    update: async function () {

        let data = Object.fromEntries(new FormData(form));
        data.id = currentUserId;
        data.estado = document.getElementById('estado-cuenta').checked ? 1 : 0;
        await userService.update(data);
    },
    
    updatePass: async function () {
        let data = Object.fromEntries(new FormData(form));
       
        await userService.updatePass(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el usuario
        await userService.delete(id);

    },

    list: async (filters = {}) => {
        let users = await userService.list(filters);
        view.listUsers(users);

    },

    profile: async function() {

        const user = await userService.profile();

        view.showUser(user);
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

        //Se limpia el usuario en edicion
        currentUserId = null;

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