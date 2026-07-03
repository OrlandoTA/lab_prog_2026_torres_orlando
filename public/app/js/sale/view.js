export const viewSale = {
    forms: {},
    init: () => {
        viewSale.forms.sales = document.forms['formAlta']
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

    showSuggestions : (clientes, activeIndex = -1) => {

        const lista = document.getElementById("lista-clientes");
        lista.innerHTML = "";

        // CASO: NO HAY RESULTADOS
        if (clientes.length === 0) {
            lista.innerHTML = `
                <div class="no-result" style ="color:red">
                    Cliente no encontrado
                </div>
            `;
            return;
        }

        // LISTA NORMAL
        clientes.forEach((c, index) => {

            const div = document.createElement("div");

            div.classList.add("clientes-item");

            if (index === activeIndex) {
                div.classList.add("active");
            }

            div.dataset.id = c.id;

            div.textContent = `${c.apellido}, ${c.nombres}`;

            lista.appendChild(div);
        });
    },

    showProductSuggestions: (productos, activeIndex = -1) => {

        const listaProducto = document.getElementById("lista-productos");
        listaProducto.innerHTML = "";

        if (productos.length === 0) {
            listaProducto.innerHTML = `
                <div class="no-resultProducto style="color:red"">
                    Producto no encontrado
                </div>
            `;
            return;
        }

        productos.forEach((p, index) => {

            const divProductos = document.createElement("div");

            divProductos.classList.add("productos-item");

            if (index === activeIndex) {
                divProductos.classList.add("active");
            }

            divProductos.dataset.id = p.id;

            divProductos.textContent = `${p.nombre} - $${p.precio} - Stock: ${p.stock}`;

            listaProducto.appendChild(divProductos);
        });
    },



    editSales: data =>{

        const sales = data[0];
        const form = document.forms['formEditSales'];
        
        const fechaAlta = document.getElementById("fecha-creacion");
        const formFields = form.elements;
        const selectPago = document.getElementById('select-pago');
        
        const inputCliente = document.getElementById("input-cliente");
        const hiddenCliente = document.getElementById("clienteId");

        inputCliente.value = sales.clienteNombre;   
        hiddenCliente.value = sales.clienteId;   


        formFields['numeroVenta'].value = sales.numeroVenta;
       
        selectPago.value = sales.formaPago;
        
        // Fecha de alta
        if (fechaAlta) {
            fechaAlta.value = sales.fecha ?? "";
        }
       
    }


};