<div class="titulo-modulo">
    <h1 title="Formulario de alta de cliente">Alta de cliente</h1>
</div>

<form action="<?= APP_URL ?>?controller=user&action=save" class="formulario-alta" title="Formulario para registrar un nuevo cliente" autocomplete="off"
    >

    <div class="fila">
        <div class="campo mitad">
            <label for="apellido" title="Ingrese el apellido del cliente">Apellido <span class="obligatorio">*</span></label>
            <input type="text" id="apellido" required title="Campo obligatorio: apellido del cliente"
                minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "apellido">
        </div>

        <div class="campo mitad">
            <label for="nombres" title="Ingrese los nombres del cliente">Nombres <span class="obligatorio">*</span></label>
            <input type="text" id="nombres" required title="Campo obligatorio: nombres del cliente"
                minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "nombres">
        </div>
    </div>
    <div class="fila">
        <div class="campo mitad">
            <label for="input-dni" title="Ingrese el DNI del cliente">DNI <span class="obligatorio">*</span></label>
            <input type="text" id="input-dni" required title="Campo obligatorio: DNI del cliente" minlength="3"
                maxlength="10" pattern="[A-Za-z0-9]+" name = "dni">
                
        </div>
        <div class="campo mitad">
                <label for="input-domicilio" title="Ingrese el domicilio del cliente">Domicilio <span class="obligatorio">*</span></label>
                <input type="text" id="input-domicilio" required title="Campo obligatorio: comicilio del cliente" minlength="3"
                    maxlength="10" pattern="[A-Za-z0-9]+" name = "domicilio">
        </div>
    </div>

    <div class="campo">
        <label for="select-perfil" title="Seleccione el tipo de perfil">Perfil <span class="obligatorio">*</span></label>
        <select id="select-perfil" title="Seleccione un perfil de cliente" name = "perfil" required>
            <option value="">Seleccionar</option>
            <option value="Particular">Particular</option>
            <option value="Empresa">Empresa</option>
        </select>
    </div>
    <div class="fila">
        <div class="campo mitad">
            <label for="input-correo" title="Ingrese el correo electrónico">Correo <span class="obligatorio">*</span></label>
            <input type="email" id="input-correo" required title="Campo obligatorio: correo electrónico válido"
                maxlength="100" name="correo">
        </div>
        <div class="campo mitad">
            <label for="input-telefono" title="Ingrese el telefono del cliente">Telefono <span class="obligatorio">*</span></label>
            <input type="text" id="input-telefono" required title="Campo obligatorio: telefono del cliente" minlength="3"
                maxlength="10" pattern="[A-Za-z0-9]+" name = "telefono">
        </div>
        
    </div>
    <div class="fila">
        <div class="campo mitad">
        <label for="input-cuit" title="Ingrese el CUIT del cliente"> CUIT <span class="obligatorio">*</span></label>
        <input type="text" id="input-cuit" required title="Campo obligatorio: CUIT del cliente" minlength="3"
            maxlength="10" pattern="[A-Za-z0-9]+" name = "cuit">
        </div>

        <div class="campo mitad">
            <label for="input-razonSocial" title="Ingrese la razon social del cliente">Razon Social <span class="obligatorio">*</span></label>
            <input type="text" id="input-razonSocial" required title="Campo obligatorio: Razon social del cliente" minlength="3"
            maxlength="10" pattern="[A-Za-z0-9]+" name = "razonSocial">
        </div>

    </div>

    <div class="campo-botones  botones-alta"  id="contenedor-botones">
        <button type="button" class="btn-guardar" id="btn-guardarCambios" title="Guardar cambios realizados" data-tipo = "exito">
            <ion-icon name="save-outline"></ion-icon>
                Crear usuario
        </button>
        <button  type="button"  onclick="window.location.href='<?= APP_URL ?>?controller=user&action=index'" class="btn-volver" title="Volver al listado de usuarios">
        <ion-icon name="arrow-back-circle-outline"></ion-icon>    
            Volver
        </button>

    </div>


</form>