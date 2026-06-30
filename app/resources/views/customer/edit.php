<form action="" class="formulario-alta" name="formEditCustomer" title="Formulario para editar un cliente existente" autocomplete="off" id="formEditCustomer">
  <div class="fila">
        <div class="campo mitad">
            <label for="apellido" title="Ingrese el apellido del cliente">Apellido <span class="obligatorio">*</span></label>
            <input type="text" id="apellido" required title="Campo obligatorio: apellido del cliente"
                minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "apellido" disabled>
        </div>

        <div class="campo mitad">
            <label for="nombres" title="Ingrese los nombres del cliente">Nombres <span class="obligatorio">*</span></label>
            <input type="text" id="nombres" required title="Campo obligatorio: nombres del cliente"
                minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "nombres"disabled>
        </div>
    </div>
    <div class="fila">
        <div class="campo mitad">
            <label for="input-dni" title="Ingrese el DNI del cliente">DNI <span class="obligatorio">*</span></label>
            <input type="text" id="input-dni" required title="Campo obligatorio: DNI del cliente" minlength="3"
                maxlength="15" pattern="[A-Za-z0-9]+" name = "dni"disabled>
                
        </div>
        <div class="campo mitad">
                <label for="input-domicilio" title="Ingrese el domicilio del cliente">Domicilio <span class="obligatorio">*</span></label>
                <input type="text" id="input-domicilio" required title="Campo obligatorio: comicilio del cliente" minlength="3"
                    maxlength="200" pattern="[A-Za-z0-9]+" name = "domicilio"disabled>
        </div>
    </div>

    <div class="campo">
        <label for="select-tipo" title="Seleccione el tipo de perfil">Tipo <span class="obligatorio">*</span></label>
        <select id="select-tipo" title="Seleccione un tipo de cliente" name = "tipo" required disabled>
            <option value="">Seleccionar</option>
            <option value="Particular">Particular</option>
            <option value="Empresa">Empresa</option>
        </select>
    </div>
    <div class="fila">
        <div class="campo mitad">
            <label for="input-correo" title="Ingrese el correo electrónico">Correo <span class="obligatorio">*</span></label>
            <input type="email" id="input-correo" required title="Campo obligatorio: correo electrónico válido"
                maxlength="150" name="correo"  disabled>
        </div>
        <div class="campo mitad">
            <label for="input-telefono" title="Ingrese el telefono del cliente">Telefono <span class="obligatorio">*</span></label>
            <input type="text" id="input-telefono" required title="Campo obligatorio: telefono del cliente" minlength="3"
                maxlength="30" pattern="[A-Za-z0-9]+" name = "telefono" disabled>
        </div>
        
    </div>
    <div class="fila">
        <div class="campo mitad">
        <label for="input-cuit" title="Ingrese el CUIT del cliente"> CUIT <span class="obligatorio">*</span></label>
        <input type="text" id="input-cuit" required title="Campo obligatorio: CUIT del cliente" minlength="3"
            maxlength="20" pattern="[A-Za-z0-9]+" name = "cuit" disabled>
        </div>

        <div class="campo mitad">
            <label for="input-razonSocial" title="Ingrese la razon social del cliente">Razon Social <span class="obligatorio">*</span></label>
            <input type="text" id="input-razonSocial" required title="Campo obligatorio: Razon social del cliente" minlength="3"
            maxlength="150" pattern="[A-Za-z0-9]+" name = "razonSocial" disabled>
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

        
        <button type="button" id="btn-exportar" title="Exportar datos a PDF">Exportar PDF</button>

        
    <div class="configuracion-cuenta">
        <div class="titulo-modulo"><h1>configuracion de cuenta</h1></div>
        
        <div  id="custom-checkbox">
            
            <input type="checkbox" id = "estado-cuenta" name ="estado">
            <label for="estado-cuenta" title="Estado actual de la cuenta" >
                Estado
                <div class="status-switch" data-unchecked="Desactivado" data-checked="Activado"></div>
            </label>

            
        </div>

        <div class="campo">
            <label for="fecha-creacion" title="Fecha en que se creó la cuenta">Fecha de creación</label>
            <input type="date" id="fecha-creacion" value="" disabled
                title="Fecha de creación de la cuenta"  name = "fechaAlta" disabled>
        </div>
    </div>
    </form>

</div>




