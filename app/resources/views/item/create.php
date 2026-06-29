<div class="titulo-modulo">
    <h1 title="Formulario de alta de producto">Alta de producto</h1>
</div>

<form action="" class="formulario-alta" title="Formulario para registrar un producto" autocomplete="off">

    <div class="fila">
        <div class="campo mitad">
            <label for="nombre" title="Ingrese el nombre del producto">Nombre<span class="obligatorio">*</span></label>
            <input type="text" id="nombre" required minlength="3" maxlength="50"
            pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]+"
            title="Escriba el nombre del producto (mínimo 3 caracteres, solo letras y números)" name="nombre">
        </div>

        <div class="campo mitad">
            <label for="codigo" title="Ingrese el código del producto">ISBN<span class="obligatorio">*</span></label>
            <input name="codigo" type="text" id="codigo" required minlength="2" maxlength="20" pattern="[A-Za-z0-9]+"
            title="Escriba el código del producto (solo letras y números, sin espacios)">
        </div>
    </div>

    <div class="campo">
        <label for="text-descripcion" title="Descripción del producto">Descripción del producto <span class="obligatorio">*</span></label>
        <textarea name="descripcion" id="text-descripcion" class="descripcion-producto" maxlength="200" minlength="10"
            title="Ingrese una descripción del producto (entre 10 y 200 caracteres)">
        </textarea>
    </div>

    <div class="campo">
        <label title="Seleccione una o más categorías">Categorias<span class="obligatorio">*</span></label>
        <div class="grupo-checkbox">
            <select name="categorias" id="categorias-select" multiple size="5" >
                <?php foreach ($this->categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nombre'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="fila">
        <div class="campo mitad">
            <label for="input-precio" title="Ingrese el precio del producto">Precio: $<span class="obligatorio">*</span></label>
            <input name="precio" type="number" id="input-precio" required min="0" max="1000000" step="0.01"
                title="Ingrese el precio en números (mayor o igual a 0)">
        </div>
        <div class="campo mitad">
            <label for="input-stock" title="Ingrese el stock disponible">Stock<span class="obligatorio">*</span>:</label>
            <input name="stock" type="number" id="input-stock" required min="0" max="10000" title="Ingrese la cantidad disponible (número entero mayor o igual a 0)">
        </div>
    </div>

    <div class="campo-botones  botones-alta">
        <button type="button" class="btn-guardar" id="btn-guardarCambios" disabledtitle="Guardar cambios realizados">
            <ion-icon name="save-outline"></ion-icon>
                Crear producto
        </button>
        <button  type="button"  onclick="window.location.href='index.php'" class="btn-volver" title="Volver al listado de usuarios">
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
            Volver
        </button>

    </div>

</form>