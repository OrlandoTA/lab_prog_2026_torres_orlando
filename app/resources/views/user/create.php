<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="../../../../public/app/js/script.js"></script>
    <script defer type="module" src="../../../../public/app/js/user/create.js"></script>


    <link rel="stylesheet" href="/lab_prog_2026_torres_orlando/public/app/css/style.css?v=1" type="text/css">

    <title>Alta de usuario</title>
</head>

<body>
    <div class="barra-navegacion" id="toggle-barra" title="Barra lateral de navegación">
        <div class="nombre-pagina">
            <ion-icon id="page-icon" name="book-outline" title="Abrir o cerrar barra lateral"></ion-icon>
            <span title="Nombre de la aplicación">Ink & Paper</span>
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
                <li class="last active"><span aria-current="page">Alta de usuario</span></li>
            </ol>
        </nav>





        <div class="titulo-modulo">
            <h1 title="Formulario de alta de usuario">Alta de usuario</h1>
        </div>

        <form action="" class="formulario-alta" title="Formulario para registrar un nuevo usuario" autocomplete="off"
            method="post">

            <div class="fila">
                <div class="campo mitad">
                    <label for="apellido" title="Ingrese el apellido del usuario">Apellido <span class="obligatorio">*</span></label>
                    <input type="text" id="apellido" required title="Campo obligatorio: apellido del usuario"
                        minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
                </div>

                <div class="campo mitad">
                    <label for="nombres" title="Ingrese los nombres del usuario">Nombres <span class="obligatorio">*</span></label>
                    <input type="text" id="nombres" required title="Campo obligatorio: nombres del usuario"
                        minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
                </div>
            </div>

            <div class="campo">
                <label for="input-cuenta" title="Ingrese el nombre de la cuenta">Cuenta <span class="obligatorio">*</span></label>
                <input type="text" id="input-cuenta" required title="Campo obligatorio: nombre de cuenta" minlength="3"
                    maxlength="10" pattern="[A-Za-z0-9]+">
            </div>

            <div class="campo">
                <label for="select-perfil" title="Seleccione el tipo de perfil">Perfil <span class="obligatorio">*</span></label>
                <select id="select-perfil" title="Seleccione un perfil de usuario" required>
                    <option value="">Seleccionar</option>
                    <option value="">Operador</option>
                    <option value="">Administrador</option>
                </select>
            </div>

            <div class="campo">
                <label for="input-correo" title="Ingrese el correo electrónico">Correo <span class="obligatorio">*</span></label>
                <input type="email" id="input-correo" required title="Campo obligatorio: correo electrónico válido"
                    maxlength="100">
            </div>

            <div class="fila">
                <div class="campo mitad">
                    <label for="input-clave" title="Ingrese una contraseña">Clave <span class="obligatorio">*</span></label>
                    <input type="password" id="input-clave" title="Ingrese una contraseña segura" required minlength="8"
                        maxlength="20" pattern=".{8,}">
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
                <button  type="button"  onclick="window.location.href='index.php'" class="btn-volver" title="Volver al listado de usuarios">
                <ion-icon name="arrow-back-circle-outline"></ion-icon>    
                    Volver
                </button>

            </div>


        </form>

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
            <p>© 2025 Ink & Paper. Todos los derechos reservados.</p>
            <a href="javascript:void(0)">ACCESIBILIDAD</a>
            <a href="javascript:void(0)">TÉRMINOS DE USO</a>
            <a href="javascript:void(0)">COOKIES</a>
        </div>

    </footer>



</body>

</html>