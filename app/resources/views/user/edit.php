<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Area de Scripts-->
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="../../../../public/app/js/script.js"></script>
    <script defer type="module" src="../../../../public/app/js/user/edit.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Area de hojas de estilos-->
    <link rel="stylesheet" href="/lab_prog_2026_torres_orlando/public/app/css/style.css?v=1">

    <title>Editar usuario</title>
</head>

<body>
        <div class="barra-navegacion" id="toggle-barra" title="Barra lateral de navegación">
        <div class="nombre-pagina">
            <ion-icon id="page-icon" name="book-outline" title="Abrir o cerrar barra lateral"></ion-icon>
            <span title="Nombre de la aplicación">Ink & Paper</span >
        </div>
   
   <input type="checkbox" name="" id="toggle">


        <nav class="navegacion" title="Menú de navegación principal">
            <ul>
                <li>
                    <a href="../home/index.php" title="Ir a la página de inicio">
                        <ion-icon name="home-outline" title="Inicio"></ion-icon>
                        <span title="Inicio">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="../item/index.php" title="Ver listado de productos">
                        <ion-icon name="basket-outline" title="Productos"></ion-icon>
                        <span title="Productos">Productos</span>
                    </a>
                </li>
                <li>
                    <a href="../sale/index.php" title="Ver ventas realizadas">
                        <ion-icon name="wallet-outline" title="Ventas"></ion-icon>
                        <span title="Ventas">Ventas</span>
                    </a>
                </li>

                <li>
                    <a href="../user/index.php" title="Administrar usuarios">
                        <ion-icon name="people-outline" title="Usuarios"></ion-icon>
                        <span title="Usuarios">Usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="" title="Notificaciones">
                        <ion-icon name="notifications-outline"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" id="mi-cuenta-btn" title="Opciones de cuenta">
                        <ion-icon name="person-outline" title="Mi cuenta"></ion-icon>

                    </a>
                    <ul class="menu-desplegable activo">
                        <li>
                            <a href="javascript:void(0)" title="Ver o editar datos personales">
                                <ion-icon name="save-outline" title="Mis datos"></ion-icon>
                                <span title="Mis datos">Mis datos</span>
                            </a>
                        </li>

                        <li>
                            <a href="../authentication/index.php" title="Cerrar sesión del sistema">
                                <ion-icon name="power-outline" title="Cerrar sesión"></ion-icon>
                                <span title="Cerrar sesión">Cerra sesión</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <label for="toggle" class="icon-bars">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </label>

        </nav>

        <!--   Modo Oscuro  
         
        <div class="modo-oscuro" title="Cambiar modo claro/oscuro">
            <div class="info">
                <ion-icon name="contrast-outline" title="Modo oscuro"></ion-icon>
                <span title="Modo oscuro">Dark</span>
            </div>

            <div class="switch" title="Activar o desactivar modo oscuro">
                <div class="base">
                    <div class="circulo" title="Interruptor de modo oscuro"></div>
                </div>
            </div>
        </div>
        --> 




    </div>

    <main class="seccion-principal">

        <nav aria-label="Breadcrumb" class="breadcrumb">
            <ol>
                <li class="first">
                    <a href="../home/index.php">
                        <ion-icon name="home-outline" title="Inicio"></ion-icon>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="../user/index.php"> 
                        <ion-icon name="people-outline" title="Usuarios"></ion-icon>
                        Gestión de Usuarios
                    </a>
                </li>
                <li class="last active"><span aria-current="page">Editar usuario</span></li>
            </ol>
        </nav>



        <div class="titulo-modulo">
            <h1 title="Formulario de edición de usuario">Perfil del usuario</h1>
        </div>
        <div class="datos-usuario">
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
                    <button  type="button"  onclick="window.location.href='index.php'" class="btn-volver" title="Volver al listado de usuarios">
                    <ion-icon name="arrow-back-circle-outline"></ion-icon>    
                        Volver
                    </button>
                    <button type="button" id="btn-editar" class="btn-editar" title="Habilitar edición">
                        <ion-icon name="pencil-outline"></ion-icon>
                        Editar
                    </button>
                    <button type="submit" class="btn-guardar" id="btn-guardarCambios" disabled
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
                        title="Fecha de creación de la cuenta"  required>
                </div>
            </div>
        </div>


    </main>


    <footer>

        <div class="contenedor-informacion">
            

            <div>
                <span title="Nombre del sistema y su version actual">Ink & Paper - Versión 0.5</span>
            </div>

            <div>
                <span title="Materia">Laboratorio de programación</span>
                <span title="Carrera">Ingenieria en Sistemas</span>
                <span title="Universidad">UNPA-UACO</span>
            </div>


            <address title="Desarrollador">
                Hecho por: Orlando Torres. <br>
                Visitanos en: Av. Libertadores 43, Bs. As. <br>
                Telefono: +54 297-443 7186
            </address>

        </div>

        <div class="derechos-autor">
            <p >© 2025 Ink & Paper. Todos los derechos reservados.</p>
            <a href="javascript:void(0)">ACCESIBILIDAD</a>
            <a href="javascript:void(0)">TÉRMINOS DE USO</a>
            <a href="javascript:void(0)">COOKIES</a>
        </div>
        
    </footer>



</body>

</html>