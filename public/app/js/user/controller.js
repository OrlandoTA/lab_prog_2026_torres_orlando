import { userService } from './service.js';

//Variable para guardar el id del usuario a actualizar
var currentUserId = null;

const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .descripcion-producto, textarea, select, .btn-cancelar')

const btnExportar = document.getElementById('btn-exportar');



//Se construye el objeto userController
export const userController = {

    load: async function (id) {

        currentUserId = id;

        const user = await userService.load(id);

        //Validacion si existe el usuario
        if (!user) {
            alert('Usuario no encontrado');
            return;
        }


        //Se muestra los datos del usuario
        inputApellido.value = user.apellido;
        inputNombre.value = user.nombres;
        inputCorreo.value = user.correo;
        inputCuenta.value = user.cuenta;
        inputFecha.value = user.fechaAlta;
        selectEstado.value = user.estado == 1;
        selectPerfil.value = user.perfil;


    },

    save: async function () {
        let data = Object.fromEntries(new FormData(form));

        await userService.save(data);
    },

    update: async function () {

        let data = Object.fromEntries(new FormData(form));
        data.id = currentUserId;
        data.estado = selectEstado.checked ? 1 : 0;

        await userService.update(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el usuario
        await userService.delete(id);

    },

    list: async function (filters = {}) {
        const users = await userService.list(filters);
        console.table(users);

    },


    search: async function (text) {

        const users = await userService.list({
            search: text
        });

        this.renderTable(users);

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
        currentUserId = null;

        //Se restaura botones los botones
        this.enableForm(false);

    },

    enableForm: function (enabled) {
        
        campos.forEach(campo => {
            campo.disabled = !enabled;
        });
    },

    renderTable(users) {

        const tbody =
            document.getElementById('tbody-usuarios');

        tbody.innerHTML = '';

        users.forEach(user => {

            tbody.innerHTML += `
            <tr>

                <td>
                    ${user.apellido} ${user.nombres}
                </td>

                <td>
                    ${user.cuenta}
                </td>

                <td>
                    ${user.perfil}
                </td>

                <td>
                    ${user.correo}
                </td>

                <td class="celda-boton">

                    <button
                        class="btn btn-editar"
                        data-id="${user.id}">

                        <ion-icon
                            name="pencil-outline">
                        </ion-icon>

                    </button>

                </td>

            </tr>
        `;

        });

        this.bindEditButtons();

    }

}