import { itemService } from './service.js';

//Variable para guardar el id del Producto a actualizar
var currentItemId = null;

const form = document.querySelector("form");

const campos = document.querySelectorAll('input, select, .btn-guardar, .descripcion-producto, textarea, select, .btn-cancelar')

const btnExportar = document.getElementById('btn-exportar');



//Se construye el objeto itemController
export const itemController = {

    load: async function (id) {

        currentItemId = id;

        const item = await itemService.load(id);

        //Validacion si existe el Producto
        if (!item) {
            alert('Producto no encontrado');
            return;
        }


        //Se muestra los datos del Producto

        inputNombre.value = item.nombre;
        inputCodigo.value = item.codigo;
        inputPrecio.value = item.precio;
        inputDescripcion.value = item.fechaAlta;
        selectCategoria.value = item.Categoria;
        inputStock.value = item.stock;


    },

    save: async function () {
        let data = Object.fromEntries(new FormData(form));

        await itemService.save(data);
    },

    update: async function () {

        let data = Object.fromEntries(new FormData(form));
        data.id = currentItemId;

        await itemService.update(data);
    },

    delete: async function (id) {

        //Se solicita el servicio de eliminar el Producto
        await itemService.delete(id);

    },

    list: async function (filters = {}) {
        const items = await itemService.list(filters);
        console.table(items);

    },


    search: async function (text) {

        const items = await itemService.list({
            search: text
        });

        this.renderTable(items);

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

        //Se limpia el Producto en edicion
        currentItemId = null;

        //Se restaura botones los botones
        this.enableForm(false);

    },

    enableForm: function (enabled) {
        
        campos.forEach(campo => {
            campo.disabled = !enabled;
        });
    },

    renderTable(items) {

        const tbody = document.getElementById('tbody-productos');

        tbody.innerHTML = '';

        items.forEach(item => {

            tbody.innerHTML += `
            <tr>

                <td>
                ${item.nombre}
                </td>

                <td>
                    ${item.codigo}
                </td>

                <td>
                    ${item.descipcion}
                </td>

                <td>
                    ${item.precio}
                </td>

                <td>
                    ${item.stock}
                </td>

                <td class="celda-boton">

                    <button
                        class="btn btn-editar"
                        data-id="${item.id}">

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