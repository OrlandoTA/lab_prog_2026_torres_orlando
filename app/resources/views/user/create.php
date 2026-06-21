<div class="titulo-modulo">
    <h1 title="Formulario de alta de usuario">Alta de usuario</h1>
</div>

<form action="<?= APP_URL ?>?controller=user&action=save" class="formulario-alta" title="Formulario para registrar un nuevo usuario" autocomplete="off"
    method="post">

    <div class="fila">
        <div class="campo mitad">
            <label for="apellido" title="Ingrese el apellido del usuario">Apellido <span class="obligatorio">*</span></label>
            <input type="text" id="apellido" required title="Campo obligatorio: apellido del usuario"
                minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "apellido">
        </div>

        <div class="campo mitad">
            <label for="nombres" title="Ingrese los nombres del usuario">Nombres <span class="obligatorio">*</span></label>
            <input type="text" id="nombres" required title="Campo obligatorio: nombres del usuario"
                minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "nombres">
        </div>
    </div>

    <div class="campo">
        <label for="input-cuenta" title="Ingrese el nombre de la cuenta">Cuenta <span class="obligatorio">*</span></label>
        <input type="text" id="input-cuenta" required title="Campo obligatorio: nombre de cuenta" minlength="3"
            maxlength="10" pattern="[A-Za-z0-9]+" name = "cuenta">
    </div>

    <div class="campo">
        <label for="select-perfil" title="Seleccione el tipo de perfil">Perfil <span class="obligatorio">*</span></label>
        <select id="select-perfil" title="Seleccione un perfil de usuario" name = "perfil" required>
            <option value="">Seleccionar</option>
            <option value="Operador">Operador</option>
            <option value="Administrador">Administrador</option>
        </select>
    </div>

    <div class="campo">
        <label for="input-correo" title="Ingrese el correo electrónico">Correo <span class="obligatorio">*</span></label>
        <input type="email" id="input-correo" required title="Campo obligatorio: correo electrónico válido"
            maxlength="100" name="correo">
    </div>

    <div class="fila">
        <div class="campo mitad">
            <label for="input-clave" title="Ingrese una contraseña">Clave <span class="obligatorio">*</span></label>
            <input type="password" id="input-clave" title="Ingrese una contraseña segura" required minlength="8"
                maxlength="20" pattern=".{8,}" name ="clave">
        </div>

        <div class="campo mitad">
            <label for="confirmar-clave" title="Confirme la contraseña">Confirmar clave <span class="obligatorio">*</span></label>
            <input type="password" id="confirmar-clave" minlength="8" required
                title="Debe coincidir con la contraseña y tener al menos 8 caracteres" maxlength="20"
                pattern=".{8,}">
        </div>
        <p title="Requisito de seguridad de contraseña">La clave debe tener minimo 8 caracteres</p>
    </div>

    <div class="campo-botones  botones-alta"  id="contenedor-botones">
        <button type="submit" class="btn-guardar" id="btn-guardarCambios" title="Guardar cambios realizados" data-tipo = "exito">
            <ion-icon name="save-outline"></ion-icon>
                Crear usuario
        </button>
        <button  type="button"  onclick="window.location.href='<?= APP_URL ?>?controller=user&action=index'" class="btn-volver" title="Volver al listado de usuarios">
        <ion-icon name="arrow-back-circle-outline"></ion-icon>    
            Volver
        </button>

    </div>


</form>