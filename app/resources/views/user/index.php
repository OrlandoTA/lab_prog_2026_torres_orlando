
        <div class="titulo-modulo">
            <div class="nombre-pagina">            
                <ion-icon name="people-outline" title="Usuarios"></ion-icon>
                <h1 title="Listado de usuarios registrados">Gestión de Usuarios</h1>
            </div>


            <button type="button" class="btn-exportar"  title="Exportar datos de usuarios">
                <ion-icon name="download-outline"></ion-icon>
                EXPORTAR
            </button>
             
            <button  onclick="window.location.href='<?= APP_URL ?>?controller=user&action=create'" class="btn-altas" title="Crear un nuevo usuario">
                <ion-icon name="person-add-outline"></ion-icon>
                AGREGAR USUARIO
            </button>

        </div>

        <div class="contenedor">
            <div class="contenedor-botones-filtros">

  
                <select  id="filtro-categoria">
                    <option value="">Filtrar por...</option>
                    <option value="tipo-operador"> Operador</option>
                    <option value="tipo-Administrador">Administrador</option>
                    <option value="nombre-descendente">Descendente(nombre)</option>
                    <option value="nombre-ascendente">Ascendente(nombre)</option>
                </select>

                <div class="contenedor-buscador">
                    <input type="text" id="input-buscar" placeholder="Buscar usuarios..." title="Ingresar texto para buscar usuarios">    
                    <button type="button" title="buscar" class="btn-buscar" ><ion-icon name="search-outline"></ion-icon></button> 

                </div>
                
            </div>

            <div class="contenedor-tabla">
                <table id="tabla-usuarios" class="tabla" title="Tabla de usuarios registrados">

                    <thead>
                        <tr>
                            <th>USUARIO</th>
                            <th>CUENTA</th>
                            <th>PERFIL(ROL)</th>
                            <th>CORREO</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-usuarios">

                    </tbody>
                </table>
            </div>

        </div>







