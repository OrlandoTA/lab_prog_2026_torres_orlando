<div id="user-detail">
    
</div>
<form action="" class="formulario-alta">
    <div class="fila">
            <div class="campo mitad">
                <label for="input-clave" title="Ingrese una contraseña">Clave nueva</label>
                <input type="password" id="input-clave" title="Ingrese una contraseña segura" required minlength="8"
                    maxlength="20" pattern=".{8,}" name ="clave">
                    <p title="Requisito de seguridad de contraseña">La clave debe tener minimo 8 caracteres</p>
            </div>

            <div class="campo mitad">
                <label for="confirmar-clave" title="Confirme la contraseña">Confirmar clave</label>
                <input type="password" id="confirmar-clave" minlength="8" 
                    title="Debe coincidir con la contraseña y tener al menos 8 caracteres" maxlength="20"
                    pattern=".{8,}">
                    
            </div>
            
    </div>
     <div class="campo-botones  botones-alta"  id="contenedor-botones">
        <button type="button" class="btn-guardar" id="btn-guardarCambios" title="Guardar cambios realizados" data-tipo = "exito">
                Cambiar contraseña
        </button>
    </div>
</form>