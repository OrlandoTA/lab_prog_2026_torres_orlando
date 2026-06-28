export const view = {
    forms: {},
    init: () => {
        view.forms.user = document.forms['formAlta']
    },
    resetForm: () => {},

    listUsers: users => {
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
        })
    },


    editUser: data =>{

        const user = data[0];
        const selectEstado = document.getElementById("estado-cuenta");
        const fechaAlta = document.getElementById("fecha-creacion");
        const form = document.forms['formEditUser'];
        const formFields = form.elements;

        formFields['nombres'].value = user.nombres;
        formFields['apellido'].value = user.apellido;
        formFields['correo'].value = user.correo;
        formFields['cuenta'].value = user.cuenta;
        formFields['perfil'].value = user.perfil;
        selectEstado.checked = user.estado == 1;
        fechaAlta.value = user.fechaAlta;
    }


};