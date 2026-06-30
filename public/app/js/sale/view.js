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
        const selectPago = document.getElementById('select-pago');
        
        selectPago.value = sales.formaPago;
        
        formFields['numeroVenta'].value = sales.numeroVenta;
        
        // Fecha de alta
        if (fechaAlta) {
            fechaAlta.value = sales.fecha ?? "";
        }
        formFields['clienteId'].value = sales.clienteId;
    }


};