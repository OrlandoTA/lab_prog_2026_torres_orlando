<div class="titulo-modulo">
    <h1 title="Formulario de alta de producto">Editar de producto</h1>
</div>

<form action="" class="formulario-alta" title="Formulario de edición de producto" autocomplete="off">

    <div class="fila">
        <div class="campo mitad">
            <label title="Nombre del producto" value="Romeo y Julieta">Nombre</label>
            <input type="text" required disabled title="No editable" minlength="2" maxlength="100"
                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+" value="Romeo y Julieta">
        </div>
        <div class="campo mitad">
            <label title="Nombre del producto" value="William Shakespeare">Autor</label>
            <input type="text" required disabled title="No editable" minlength="2" maxlength="100"
                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+" value="William Shakespeare">
        </div>
        <div class="campo mitad">
            <label title="Código del producto" value="003">Código</label>
            <input type="text" required disabled title="No editable" minlength="3" maxlength="15"
                pattern="[A-Za-z0-9]+"   value="003">
        </div>
        <div class="campo mitad">
            <label title="Código ISBN" value="ZZ8902"> ISBN</label>
            <input type="text" required disabled title="No editable" minlength="3" maxlength="15"
                pattern="[A-Za-z0-9]+" value="ZZ8902">
        </div>
    </div>

    <div class="campo">
        <label title="Descripción del producto" value="Cuento de romance">Descripción</label>
        <textarea class="descripcion-producto" disabled title="No editable" required minlength="10" maxlength="200">Romeo y Julieta es una tragedia de William Shakespeare (aprox. 1595) sobre dos jóvenes amantes, Romeo Montesco y Julieta Capuleto, cuyas familias en Verona sostienen una antigua enemistad. Su amor apasionado y secreto, sellado con un matrimonio rápido, se enfrenta al destino y al odio familiar, culminando en un doble suicidio que finalmente reconcilia a sus familias.
        </textarea>
    </div>

    <div class="campo">
        <label title="Seleccione una o más categorías">Categoria</label>
        <div class="grupo-checkbox">
            <label title="Categoría Romance">
                <input type="checkbox" name="Categoria" value="Romance" disabled> Romance
            </label>
            <label title="Categoría Comedia">
                <input type="checkbox" name="Categoria" value="comedia" disabled> Comedia
            </label>
            <label title="Categoría Thriller">
                <input type="checkbox" name="Categoria" value="thriller" disabled> Thriller
            </label>
            <label title="Categoría Terror">
                <input type="checkbox" name="Categoria" value="terror"disabled> Terror
            </label>
            <label title="Categoría Suspenso">
                <input type="checkbox" name="Categoria" value="Suspenso" disabled> Suspenso
            </label>
        </div>
    </div>
    <div class="campo-botones">
        <button  type="button"  onclick="window.location.href='index.php'" class="btn-volver" title="Volver al listado de usuarios">
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

    <p id="mensaje-exitoso" class="oculto" title="Mensaje de confirmación">
        El producto fue editado con éxito
    </p>

    <button type="button" id="btn-exportar" title="Exportar a PDF">Generar PDF</button>

</form>


