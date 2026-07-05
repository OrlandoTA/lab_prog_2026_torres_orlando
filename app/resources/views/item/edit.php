<div class="titulo-modulo">
    <h1 title="Formulario de alta de producto">Editar de producto</h1>
</div>

<form action="" class="formulario-alta" title="Formulario de edición de producto" autocomplete="off" name="formEditItems">

    <div class="fila">
        <div class="campo mitad">
            <label title="Nombre del producto" value="">Nombre</label>
            <input type="text" required disabled title="No editable" minlength="2" maxlength="100"
                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+" name="nombre" value="">
        </div>       
         <div class="campo mitad">
            <label for="autor">Autor</label>
            <input
                type="text"
                id="autor"
                name="autor"
                maxlength="150">
        </div>
    </div>
    <div class="fila">
        <div class="campo mitad">
            <label for="input-precio" title="Ingrese el precio del producto">Precio: $</label>
            <input name="precio" type="number" id="input-precio" required min="0" max="1000000" step="0.01"
                title="Ingrese el precio en números (mayor o igual a 0)" value="" disabled>
        </div>
        <div class="campo mitad">
            <label for="input-stock" title="Ingrese el stock disponible">Stock:</label>
            <input value="" disabled name="stock" type="number" id="input-stock" required min="0" max="10000" title="Ingrese la cantidad disponible (número entero mayor o igual a 0)">
        </div>
    </div>
    <div class="campo">
        <label title="Descripción del producto" value="">Descripción</label>
        <textarea name="descripcion" class="descripcion-producto" disabled title="No editable" value="" required minlength="10" maxlength="200">

        </textarea>
    </div>

    <div class="campo">
        <label title="Seleccione una o más categorías">Categoria<span class="obligatorio">*</span></label>
        <div class="grupo-checkbox">
            <select name="categorias" id="categorias-select" multiple size="5" disabled >
                <?php foreach ($this->categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nombre'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="campo-botones">
        <button  type="button" id="btnVolver" class="btn-volver" title="Volver al listado de usuarios">
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
            Volver
        </button>
        <button type="button" id="btn-editar" class="btn-editar" title="Habilitar edición">
            <ion-icon name="pencil-outline"></ion-icon>
            Editar
        </button>
        <button type="submit" class="btn-guardar" id="btn-guardarCambios"  disabled title="Guardar cambios">
            <ion-icon name="save-outline"></ion-icon>
            Guardar cambios
        </button>
        <button type="button" class="btn-cancelar" title="Cancelar cambios" id="btn-cancelar" disabled>Cancelar</button>
        <button type="button" class="btn-eliminar" id="btn-eliminar" title="Eliminar usuario">
            <ion-icon name="trash-outline"></ion-icon>
            Eliminar
        </button>
    </div>

    <button type="button" id="btn-exportar" title="Exportar a PDF">Generar PDF</button>

</form>


