import { customerService } from './service.js';
import { view } from './view.js'

//Variable para guardar el id del usuario a actualizar
var currentCustomerId = null;

const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .descripcion-producto,  .btn-cancelar')

const btnExportar = document.getElementById('btn-exportar');



//Se construye el objeto userController
export const customerController = {

    load: async function (id) {

        currentCustomerId = id;
        
        const customer =  await customerService.load(id);
        //view.editUser(user);
    },

    save: async function () {
        let data = Object.fromEntries(new FormData(form));
       
        await customerService.save(data);
    },

    update: async function () {

        let data = Object.fromEntries(new FormData(form));
        data.id = currentCustomerId;
        data.estado = document.getElementById('estado-cuenta').checked ? 1 : 0;
        await customerService.update(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el usuario
        await customerService.delete(id);

    },

    list: async (filters = {}) => {
        let customers = await customerService.list(filters);
        //view.listUsers(users);

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

        //Se limpia el usuario en edicion
        currentCustomerId = null;

        //Se restaura botones los botones
        this.enableForm(false);

    },

    enableForm: function (enabled) {
        
        campos.forEach(campo => {
            campo.disabled = !enabled;
        });
    },

}