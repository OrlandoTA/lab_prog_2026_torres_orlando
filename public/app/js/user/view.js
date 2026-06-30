export const view = {
    forms: {},
    init: () => {
        view.forms.user = document.forms['formAlta']
    },
    resetForm: () => {},

showUser: user => {
    const contenedor = document.getElementById("user-detail");
    const usuario = user[0];

    contenedor.innerHTML = `
        <div class="card-user">

            <h2 class="card-user__titulo">Mis datos</h2>

            <div class="card-user__dato">
                <span class="card-user__label">Nombre</span>
                <span class="card-user__valor">${usuario.nombres}</span>
            </div>

            <div class="card-user__dato">
                <span class="card-user__label">Apellido</span>
                <span class="card-user__valor">${usuario.apellido}</span>
            </div>

            <div class="card-user__dato">
                <span class="card-user__label">Cuenta</span>
                <span class="card-user__valor">${usuario.cuenta}</span>
            </div>

            <div class="card-user__dato">
                <span class="card-user__label">Correo</span>
                <span class="card-user__valor">${usuario.correo}</span>
            </div>

            <div class="card-user__dato">
                <span class="card-user__label">Perfil</span>
                <span class="card-user__valor">${usuario.perfil}</span>
            </div>

            <div class="card-user__dato">
                <span class="card-user__label">Fecha de alta</span>
                <span class="card-user__valor">${usuario.fechaAlta}</span>
            </div>

            <div class="card-user__dato">
                <span class="card-user__label">Estado</span>
                <span class="card-user__valor">
                    ${usuario.estado == 1 ? "Activo" : "Inactivo"}
                </span>
            </div>

        </div>
    `;
},
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
                // Fecha de alta
        if (fechaAlta) {
            fechaAlta.value = user.fechaAlta ?? "";
        }
    }


};