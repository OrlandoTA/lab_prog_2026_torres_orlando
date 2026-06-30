
        <div class="titulo-modulo">
            <div class="nombre-pagina">            
                <ion-icon name="wallet-outline" title = "Ventas"></ion-icon>
                <h1 title="Listado de ventas registradas">Gestión de Ventas</h1>
            </div>


            <button type="button" class="btn-exportar"  title="Exportar datos de venta">
                <ion-icon name="download-outline"></ion-icon>
                EXPORTAR
            </button>
             
            <button   class="btn-altas" title="Crear una nueva venta">
                <ion-icon name="add-outline"></ion-icon>
                AGREGAR VENTA
            </button>

        </div>

        <div class="contenedor">
            <div class="contenedor-botones-filtros">
                <div class="contenedor-fecha">
                    <label for="fecha-inicio">Desde</label>
                    <input type="date" name="fecha-inicio" id="fecha-inicio">

                    <label for="fecha-hasta">Hasta</label>
                    <input type="date" name="fecha-hasta" id="fecha-hasta">
                    
                    <button type="button" title="buscar" class="btn-buscar" >
                        <ion-icon name="search-outline"></ion-icon>
                    </button> 
                </div>

                <select  id="filtro-categoria">
                    <option value="">Forma de pago...</option>
                    <option value="tipo-debito"> Debito </option>
                    <option value="tipo-credito"> Credito </option>
                    <option value="tipo-transferencia">Transferencia</option>
                    <option value="tipo-efectivo">Efectivo</option>
                </select>

                <div class="contenedor-buscador">
                    <input type="text" id="input-buscar" placeholder="Buscar venta..." value = "" title="Ingresar texto para buscar usuarios">    
                    <button type="button" title="buscar" class="btn-buscar" >
                        <ion-icon name="search-outline"></ion-icon>
                    </button> 

                </div>
                
            </div>

            <div class="contenedor-tabla">
                <table id="tabla-ventas" class="tabla" title="Tabla de ventas registrados">

                    <thead>
                        <tr>
                            <th>NRO DE VENTA</th>
                            <th>FECHA</th>
                            <th>CLIENTE</th>
                            <th>FORMA DE PAGO</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-ventas">

                    </tbody>
                </table>
            </div>

        </div>







