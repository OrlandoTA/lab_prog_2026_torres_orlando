
        <div class="titulo-modulo">
            <div class="nombre-pagina">            
                <ion-icon name="people-outline" title="Clientes"></ion-icon>
                <h1 title="Listado de clientes registrados">Gestión de Clientes</h1>
            </div>


            <button type="button" class="btn-exportar"  title="Exportar datos de clientes">
                <ion-icon name="download-outline"></ion-icon>
                EXPORTAR
            </button>
             
            <button   class="btn-altas" title="Crear un nuevo cliente">
                <ion-icon name="person-add-outline"></ion-icon>
                AGREGAR CLIENTE
            </button>

        </div>

        <div class="contenedor">
            <div class="contenedor-botones-filtros">

  
                <select  id="filtro-categoria">
                    <option value="">Filtrar por...</option>
                    <option value="tipo-empresa"> Empresa</option>
                    <option value="tipo-particular">Particular</option>
                    <option value="nombre-descendente">Descendente(nombre)</option>
                    <option value="nombre-ascendente">Ascendente(nombre)</option>
                </select>

                <div class="contenedor-buscador">
                    <input type="text" id="input-buscar" placeholder="Buscar cliente..." value = "" title="Ingresar texto para buscar usuarios">    
                    <button type="button" title="buscar" class="btn-buscar" >
                        <ion-icon name="search-outline"></ion-icon>
                    </button> 

                </div>
                
            </div>

            <div class="contenedor-tabla">
                <table id="tabla-clientes" class="tabla" title="Tabla de clientes registrados">

                    <thead>
                        <tr>
                            <th>CLIENTE</th>
                            <th>CUIT</th>
                            <th>TIPO</th>
                            <th>CORREO</th>
                            <th>TELEFONO</th>
                            <th>DOMICILIO</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-clientes">

                    </tbody>
                </table>
            </div>

        </div>







