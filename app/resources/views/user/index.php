<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script defer src="../../../../public/app/js/script.js"></script>
    <script defer type="module" src="../../../../public/app/js/user/index.js"></script>


    <link rel="stylesheet" href="/lab_prog_2026_torres_orlando/public/app/css/style.css?v=1">

    <title>Bienvenido a Ink & Paper</title>
</head>

<body>
        <div class="barra-navegacion" id="toggle-barra" title="Barra lateral de navegación">
        <div class="nombre-pagina">
            <ion-icon id="page-icon" name="book-outline" title="Icono pagina nombre"></ion-icon>
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
                <li class="last active"><span aria-current="page">Gestión de Usuarios</span></li>
            </ol>
        </nav>



        <div class="titulo-modulo">
            <div class="nombre-pagina">            
                <ion-icon name="people-outline" title="Usuarios"></ion-icon>
                <h1 title="Listado de usuarios registrados">Gestión de Usuarios</h1>
            </div>


            <button type="button" class="btn-exportar"  title="Exportar datos de usuarios">
                <ion-icon name="download-outline"></ion-icon>
                EXPORTAR
            </button>
             
            <button onclick="window.location.href='create.php'" class="btn-altas" title="Crear un nuevo usuario">
                <ion-icon name="person-add-outline"></ion-icon>
                AGREGAR USUARIO
            </button>

        </div>

        <div class="contenedor">
            <div class="contenedor-botones-filtros">

  
                <select  id="filtro-categoria">
                    <option value="">Filtrar por...</option>
                    <option value="tipo-operador"> Operador</option>
                    <option value="tipo-Administrador">Administrador</option>
                    <option value="nombre-descendente">Descendente(nombre)</option>
                    <option value="nombre-ascendente">Ascendente(nombre)</option>
                </select>

                <div class="contenedor-buscador">
                    <input type="text" id="input-buscar" placeholder="Buscar usuarios..." title="Ingresar texto para buscar usuarios">    
                    <button type="button" title="buscar" class="btn-buscar" ><ion-icon name="search-outline"></ion-icon></button> 

                </div>
                
            </div>

            <div class="contenedor-tabla">
                <table id="tabla-usuarios" class="tabla" title="Tabla de usuarios registrados">

                    <thead>
                        <tr>
                            <th>USUARIO</th>
                            <th>CUENTA</th>
                            <th>PERFIL(ROL)</th>
                            <th>CORREO</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-usuarios">

                    </tbody>
                </table>
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