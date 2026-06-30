<div class="titulo-modulo">
    <h1 title="Formulario de alta de venta">Alta de Venta</h1>
</div>

<form action="" class="formulario-alta" title="Formulario para registrar una venta" autocomplete="off">

    <div class="fila">
        <div class="campo mitad">
            <label for="formaPago" title="Ingrese la forma de pago">Forma de pago<span class="obligatorio">*</span></label>
            <input type="text" id="formaPago" required minlength="3" maxlength="50"
            pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]+"
            title="Escribala forma de pago" name="formaPago">
        </div>

        <div class="campo mitad">
            <label for="numeroVenta" title="Ingrese el numero de venta">Numero de venta<span class="obligatorio">*</span></label>
            <input name="numeroVenta" type="text" id="numeroVenta" required min="0" max="1000000" step="0.01"
            title="Escriba el numero de venta (solo letras y números, sin espacios)">
        </div>
    </div>  

    <div class="campo">
       <label for="clienteId" title="Ingrese el cliente">Cliente<span class="obligatorio">*</span></label>
            <input type="text" id="clienteId" required minlength="3" maxlength="50"
            pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]+"
            title="Escribala forma de pago" name="clienteId">
    </div>

    <div class="campo-botones  botones-alta">
        <button type="button" class="btn-guardar" id="btn-guardarCambios" disabledtitle="Guardar cambios realizados">
            <ion-icon name="save-outline"></ion-icon>
                Crear venta
        </button>
        <button  type="button"  onclick="window.location.href='index.php'" class="btn-volver" title="Volver al listado de usuarios">
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
            Volver
        </button>

    </div>

</form>