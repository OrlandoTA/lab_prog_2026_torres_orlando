<div class="titulo-modulo">
    <h1 title="Listado de productos registrados">
        <ion-icon name="basket-outline" title="Productos"></ion-icon>
        Gestión de Productos
    </h1>


    <button type="button" class="btn-exportar" title="Exportar datos de usuarios">
        <ion-icon name="download-outline"></ion-icon>
        EXPORTAR
    </button>

        
    <button class="btn-altas" id="btnNewItem" title="Ir a la pantalla de alta de producto" onclick="window.location.href='<?= APP_URL ?>?controller=item&action=create'">
        <ion-icon name="add-circle-outline"></ion-icon>
        AGREGAR PRODUCTO
    </button>
</div>

<div class="contenedor">
    <div class="contenedor-botones-filtros">


        <select id="filtro-categoria" valeu="Filtrar por...">
            <option value="">Filtrar por...</option>
            <option value="categoria"> Categoria</option>
            <option value="menor-precio">Menor Precio</option>
            <option value="mayor-precio">Mayor Precio</option>
            <option value="nombre-descendente">Descendente(nombre)</option>
            <option value="nombre-ascendente">Ascendente(nombre)</option>
        </select>

        <div class="contenedor-buscador">
            <input type="text" id="input-buscar" placeholder="Buscar productos..."
                title="Ingresar texto para buscar usuarios">
            <button type="button" title="buscar" class="btn-buscar"><ion-icon
                    name="search-outline"></ion-icon></button>

        </div>


    </div>

    <div class="contenedor-tabla">
        <table class="tabla" title="Tabla con listado de productos">
            <tr>
                <th title="Nombre del producto">NOMBRE</th>
                <th title="Código del producto">CÓDIGO</th>
                <th title="Descripción del producto">DESCRIPCIÓN</th>
                <th title="Categoría del producto">CATEGORIA</th>
                <th title="Precio del producto">PRECIO</th>
                <th title="Cantidad disponible en stock">STROCK</th>
                <th title="Opciones disponibles">OPCIONES</th>
            </tr>
            <tbody id="tbody-productos">
                    <td class="celda-boton" title="Opciones del usuario">
                        <button type="button" onclick="window.location.href='edit.php'" class="btn btn-editar"
                            title="Editar usuario seleccionado">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </button>
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>

</div>