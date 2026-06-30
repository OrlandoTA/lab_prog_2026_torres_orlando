export const view = {

    contenedor: {},

    init: () => {
        view.contenedor.user = document.getElementById("user-detail");
    },

    showUser: user => {

        view.contenedor.user.innerHTML = `
            <div class="card-user">

                <h2>Mis datos</h2>

                <p><strong>Nombre:</strong> ${user.nombres}</p>
                <p><strong>Apellido:</strong> ${user.apellido}</p>
                <p><strong>Cuenta:</strong> ${user.cuenta}</p>
                <p><strong>Correo:</strong> ${user.correo}</p>
                <p><strong>Perfil:</strong> ${user.perfil}</p>
                <p><strong>Fecha:</strong> ${user.fechaAlta}</p>
                <p><strong>Estado:</strong> ${user.estado == 1 ? "Activo" : "Inactivo"}</p>

            </div>
        `;
    }
};