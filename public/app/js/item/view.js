export const view = {
    forms: {},
    init: () => {
        view.forms.items = document.forms['formAlta']
    },
    resetForm: () => {},

    listItems: items => {
        const tbody =
        document.getElementById('tbody-productos');

        tbody.innerHTML = '';

        items.forEach(items => {

            tbody.innerHTML += `
            <tr>

                <td>
                     ${items.nombre}
                </td>

                <td>
                    ${items.codigo}
                </td>


                <td>
                    ${items.descripcion}
                </td>

                <td>
                    ${items.precio}
                </td>

                <td>
                    ${items.stock}
                </td>

                <td class="celda-boton">

                    <button
                        class="btn btn-editar"
                        data-id="${items.id}">

                        <ion-icon
                            name="pencil-outline">
                        </ion-icon>

                    </button>

                </td>

            </tr>
        `;
        })
    },


    editItems: data =>{

        const items = data[0];
        const form = document.forms['formEditItems'];
        const formFields = form.elements;
        const set = new Set(items.categorias.map(String));

        for (const option of formFields['categorias'].options) {
            option.selected = set.has(option.value);
        }
        formFields['nombre'].value = items.nombre;
        formFields['descripcion'].value = items.descripcion;
        formFields['precio'].value = items.precio;
        formFields['stock'].value = items.stock;
    }


};