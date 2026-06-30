export const view = {
    forms: {},
    init: () => {
        view.forms.customer = document.forms['formAlta']
    },
    resetForm: () => {},

    listCustomers: customers => {
        const tbody =
        document.getElementById('tbody-clientes');

        tbody.innerHTML = '';

        customers.forEach(customer => {

            tbody.innerHTML += `
            <tr>

                <td>
                    ${customer.apellido} ${customer.nombres}
                </td>

                <td>
                    ${customer.cuit}
                </td>

                <td>
                    ${customer.tipo}
                </td>

                <td>
                    ${customer.correo}
                </td>
                
                <td>
                    ${customer.telefono}
                </td>
                
                <td>
                    ${customer.domicilio}
                </td>

                <td class="celda-boton">

                    <button
                        class="btn btn-editar"
                        data-id="${customer.id}">

                        <ion-icon
                            name="pencil-outline">
                        </ion-icon>

                    </button>

                </td>

            </tr>
        `;
        })
    },

    editCustomer: data => {

        const customer = data[0];

        const selectEstado = document.getElementById("estado-cuenta");
        const fechaAlta = document.getElementById("fecha-creacion");

        const form = document.forms['formEditCustomer'];
        const formFields = form.elements;

        // Datos personales
        formFields['apellido'].value = customer.apellido ?? "";
        formFields['nombres'].value = customer.nombres ?? "";
        formFields['dni'].value = customer.dni ?? "";
        formFields['tipo'].value = customer.tipo ?? "";

        // Contacto
        formFields['correo'].value = customer.correo ?? "";
        formFields['telefono'].value = customer.telefono ?? "";
        formFields['domicilio'].value = customer.domicilio ?? "";

        // Empresa
        formFields['cuit'].value = customer.cuit ?? "";
        formFields['razonSocial'].value = customer.razonSocial ?? "";

        // Estado
        if (selectEstado) {
            selectEstado.checked = Number(customer.estado) === 1;
        }

        // Fecha de alta
        if (fechaAlta) {
            fechaAlta.value = customer.fechaAlta ?? "";
        }
    }

};