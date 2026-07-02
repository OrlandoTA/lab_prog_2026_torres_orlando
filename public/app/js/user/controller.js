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

    exportPDF: function () {
        
        
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

}