<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
    <script defer src="../../../../public/app/js/script.js"></script>
    <link rel="stylesheet" href="../../../../public/app/css/style.css?v=1" type="text/css">




    <title>Bienvenido a Ink & Paper</title>
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

    <main class="seccion-principal" title="Contenido principal de la página">

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