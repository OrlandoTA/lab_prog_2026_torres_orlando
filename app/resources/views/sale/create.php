<div class="titulo-modulo">
    <h1 title="Formulario de alta de venta">Alta de Venta</h1>
</div>

<form action="" class="formulario-alta" title="Formulario para registrar una venta" autocomplete="off">

    <div class="fila">
        <div class="campo mitad">
            <label for="select-pago" title="Ingrese la forma de pago">Forma de pago<span class="obligatorio">*</span></label>
            <select id="select-pago" title="Seleccione una forma de pago" name = "formaPago" required>
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
            title="Escriba el numero de venta (solo letras y números, sin espacios)">
        </div>
    </div>  

    <div class="fila">
        <div class="campo mitad">
            <label for="input-cliente" title="Seleccione un cliente">Clientes<span class="obligatorio">*</span></label>
            <input type="text" id="input-cliente" placeholder = "Buscar cliente..." autocomplete = "off">
            
            <input type="hidden" id = "clienteId" name = "clienteId">

            <div class="lista-sugrencias" id="lista-clientes"></div>
            
        </div>
        <div class="campo mitad">
            <label for="fecha-creacion" title="Fecha en que se creó la cuenta">Fecha de creación</label>
            <input type="date" id="fecha-creacion" value="" disabled
                title="Fecha de creación de la cuenta"  name = "fecha">
        </div>
        
    </div>

    <div class="campo">
       
            <label for="input-producto" title="Seleccione un producto">Producto<span class="obligatorio">*</span></label>
            <input type="text" id="input-producto" placeholder = "Buscar producto..." autocomplete = "off">
            
            <input type="hidden" id = "productoId" name = "productoId">

            <div class="lista-sugrenciasProducto" id="lista-productos"></div>
    </div>
    <div class="campo">
       <label for="input-cantidad">Cantidad</label>
       <input type="number" id="input-cantidad" name="cantidad" min="1">
        <button type="button" class="btn btn-guardar" id="btn-agregarProducto">Agregar</button>
    </div>


    <table class="tabla-detalle-venta">

        <thead>
            <tr>
                <th>Producto</th>

                <th>Cantidad</th>

                <th>Precio</th>

                <th>Subtotal</th>


            </tr>
        </thead>

        <tbody id="detalle-venta">
            
        </tbody>

    </table>

    <div class="total-venta">

        <h3>Total: $<span id="total">0.00</span></h3>

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