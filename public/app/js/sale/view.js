export const view = {
    forms: {},
    init: () => {
        view.forms.sales = document.forms['formAlta']
    },
    resetForm: () => {},

    listSales: sales => {
        const tbody =
        document.getElementById('tbody-ventas');

        tbody.innerHTML = '';

        sales.forEach(sales => {

            tbody.innerHTML += `
            <tr>

                <td>
                     ${sales.numeroVenta}
                </td>

                <td>
                    ${sales.fecha}
                </td>


                <td>
                    ${sales.clienteId}
                </td>

                <td>
                    ${sales.formaPago}
                </td>

                <td class="celda-boton">

                    <button
                        class="btn btn-editar"
                        data-id="${sales.id}">

                        <ion-icon
                            name="pencil-outline">
                        </ion-icon>

                    </button>

                </td>

            </tr>
        `;
        })
    },


    editSales: data =>{

        const sales = data[0];
        const form = document.forms['formEditSales'];
        const fechaAlta = document.getElementById("fecha-creacion");
        const formFields = form.elements;
    
        formFields['numeroVenta'].value = sales.numeroVenta;
        
        // Fecha de alta
        if (fechaAlta) {
            fechaAlta.value = sales.fechaAlta ?? "";
        }
        formFields['formaPago'].value = sales.formaPago;
        formFields['clienteId'].value = sales.clienteId;
    }


};