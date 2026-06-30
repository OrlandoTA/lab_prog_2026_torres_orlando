<div class="titulo-modulo">
    <h1 title="Formulario de alta de venta">Alta de Venta</h1>
</div>

<form action="" class="formulario-alta" title="Formulario para registrar una venta" autocomplete="off"  name="formEditSales" id ="formEditSales">

    <div class="fila">
        <div class="campo mitad">
            <label for="formaPago" title="Ingrese la forma de pago">Forma de pago<span class="obligatorio">*</span></label>
            <select id="select-pago" title="Seleccione una forma de pago" name = "formaPago" disabled>
                <option value="">Seleccionar</option>
                <option value="Debito">Debito</option>
                <option value="Credito">Credito</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Efectivo">Efectivo</option>
            </select>
        </div>

        <div class="campo mitad">
            <label for="numeroVenta" title="Ingrese el numero de venta">Numero de venta<span class="obligatorio">*</span></label>
            <input name="numeroVenta" type="text" id="numeroVenta" required min="0" max="1000000" step="0.01"
            title="Escriba el numero de venta (solo letras y números, sin espacios)" disabled>
        </div>
    </div>  

    <div class="fila">
        <div class="campo mitad">
            <label for="clienteId" title="Ingrese el cliente">Cliente<span class="obligatorio">*</span></label>
            <input type="text" id="clienteId" required minlength="3" maxlength="50"
            pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]+"
            title="Escribala forma de pago" name="clienteId" disabled>
        </div>  
        <div class="campo mitad">
            <label for="fecha-creacion" title="Fecha en que se creó la cuenta">Fecha de creación</label>
            <input type="date" id="fecha-creacion" value="" disabled
                title="Fecha de creación de la cuenta"  name = "fecha">
        </div>
    </div>

    <div class="campo-botones">
            <button  type="button" class="btn-volver" id="btnVolver" title="Volver al listado de usuarios">
            <ion-icon name="arrow-back-circle-outline"></ion-icon>    
                Volver
            </button>
            <button type="button" id="btn-editar" class="btn-editar" title="Habilitar edición">
                <ion-icon name="pencil-outline"></ion-icon>
                Editar
            </button>
            <button type="button" class="btn-guardar" id="btn-guardarCambios" disabled
                title="Guardar cambios realizados">
                <ion-icon name="save-outline"></ion-icon>
                Guardar cambios</button>
            <button type="button" id="btn-cancelar" class="btn-cancelar" title="Cancelar edición" disabled>Cancelar</button>
            <button type="button" class="btn-eliminar" id="btn-eliminar" title="Eliminar usuario">
                <ion-icon name="trash-outline"></ion-icon>
                Eliminar
            </button>
        </div>

</form>