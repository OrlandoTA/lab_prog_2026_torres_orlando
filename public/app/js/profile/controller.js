import { profileService } from './service.js';
import { view } from './view.js'

//Variable para guardar el id del usuario a actualizar
var currentUserId = null;

const form = document.querySelector("form");


//Se construye el objeto userController
export const profileController = {

    load: async function (id) {

        currentUserId = id;
        
        const user =  await profileService.load(id);
        view.editUser(user);
    },


    list: async (filters = {}) => {
        let users = await profileService.list(filters);
        view.listUsers(users);

    },


}