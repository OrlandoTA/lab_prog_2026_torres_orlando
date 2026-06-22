

    <form action="" class="formulario-alta" title="Formulario para editar un usuario existente" autocomplete="off" id="formEditUser">

        <div class="fila">
            <div class="campo mitad">
                <label for="apellido" title="Apellido del usuario">Apellido </label>
                <input type="text" id="apellido" disabled value="Jones" title="Apellido (no editable)" required
                    minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name = "apellido">
            </div>

            <div class="campo mitad">
                <label for="nombres" title="Nombres del usuario">Nombres </label>
                <input type="text" id="nombres" disabled value="Juan Luis" title="Nombres (no editables)" required
                    minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" name= "nombres">
            </div>
        </div>

        <div class="campo">
            <label for="input-cuenta" title="Cuenta del usuario">Cuenta </label>
            <input type="text" id="input-cuenta" disabled value="P031" title="Cuenta (no editable)" required
                minlength="3" maxlength="10" pattern="[A-Za-z0-9]+" name = "cuenta">
        </div>



        <div class="campo">
            <label for="select-perfil" title="Perfil del usuario">Perfil </label>
            <select name = "perfil" id="select-perfil" disabled title="Indica si la cuenta está activa o inactiva" required>
                <option value="">Seleccionar</option>
                <option  value="operador">Operador</option>
                <option  value="administrador">Administrador</option>
            </select>
        </div>

        <div class="campo">
            <label for="input-correo" title="Correo electrónico del usuario">Correo </label>
            <input type="email" id="input-correo" disabled value="jjones@gamil.com" title="Correo (no editable)"
                required maxlength="100" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}" name = "correo">
        </div>

        
        <div class="fila" id ='fila-contraseña'>
            <div class="campo-mitad">
                <label for="input-clave" title="Contraseña del usuario">Clave <span >*</span></label>
                <input type="password" id="input-clave" disabled title="Contraseña (no editable)" minlength="8"
                    maxlength="20" pattern=".{8,}" name = "resetPass">
            </div>

            <div class="campo-mitad">
                <label for="confirmar-clave" title="Confirmación de contraseña">Confirmar clave </label>
                <input type="password" id="confirmar-clave" minlength="8" maxlength="20" disabled
                    title="Confirmación (no editable)" pattern=".{8,}" name = "resetPass">
            </div>
            <p title="Requisito de contraseña">La clave debe tener minimo 8 caracteres</p>
        </div>

        <div class="campo-botones">
            <button  type="button"   onclick="window.location.href='<?= APP_URL ?>?controller=user&action=index'" class="btn-volver" title="Volver al listado de usuarios">
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
    </form>

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
            <input type="date" id="fecha-creacion" value="2026-04-19" disabled
                title="Fecha de creación de la cuenta"  name = "" required>
        </div>
    </div>
</div>




