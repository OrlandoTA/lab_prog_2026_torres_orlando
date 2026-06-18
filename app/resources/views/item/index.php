<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="../../../../public/app/js/script.js"></script>
    <link rel="stylesheet" href="/lab_prog_2026_torres_orlando/public/app/css/style.css?v=1">

    <title>Ink & Paper-Tabla de productos</title>
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
                <li class="last active"><span aria-current="page">Gestión de productos</span></li>
            </ol>
        </nav>

        <div class="titulo-modulo">
            <h1 title="Listado de productos registrados">
                <ion-icon name="basket-outline" title="Productos"></ion-icon>
                Gestión de Productos
            </h1>


            <button type="button" class="btn-exportar" title="Exportar datos de usuarios">
                <ion-icon name="download-outline"></ion-icon>
                EXPORTAR
            </button>

             
            <button class="btn-altas" id="btnNewItem" title="Ir a la pantalla de alta de producto" onclick="window.location.href='create.php'">
                <ion-icon name="add-circle-outline"></ion-icon>
                AGREGAR PRODUCTO
            </button>
        </div>

        <div class="contenedor">
            <div class="contenedor-botones-filtros">


                <select id="filtro-categoria" valeu="Filtrar por...">
                    <option value="">Filtrar por...</option>
                    <option value="categoria"> Categoria</option>
                    <option value="menor-precio">Menor Precio</option>
                    <option value="mayor-precio">Mayor Precio</option>
                    <option value="nombre-descendente">Descendente(nombre)</option>
                    <option value="nombre-ascendente">Ascendente(nombre)</option>
                </select>

                <div class="contenedor-buscador">
                    <input type="text" id="input-buscar" placeholder="Buscar productos..."
                        title="Ingresar texto para buscar usuarios">
                    <button type="button" title="buscar" class="btn-buscar"><ion-icon
                            name="search-outline"></ion-icon></button>

                </div>


            </div>

            <div class="contenedor-tabla">
                <table class="tabla" title="Tabla con listado de productos">
                    <tr>
                        <th title="Nombre del producto">NOMBRE</th>
                        <th title="Código del producto">CÓDIGO</th>
                        <th title="Descripción del producto">DESCRIPCIÓN</th>
                        <th title="Categoría del producto">CATEGORIA</th>
                        <th title="Precio del producto">PRECIO</th>
                        <th title="Cantidad disponible en stock">STROCK</th>
                        <th title="Opciones disponibles">OPCIONES</th>
                    </tr>
                    <tr>
                        <td title="Nombre del producto">Romeo y Julieta</td>
                        <td title="Código del producto">003</td>
                        <td
                            title="Romeo y Julieta es una tragedia de William Shakespeare (aprox. 1595) sobre dos jóvenes amantes, Romeo Montesco y Julieta Capuleto, cuyas familias en Verona sostienen una antigua enemistad. Su amor apasionado y secreto, sellado con un matrimonio rápido, se enfrenta al destino y al odio familiar, culminando en un doble suicidio que finalmente reconcilia a sus familias.">
                            Romeo y Julieta es una tragedia de William Shakespeare (aprox. 1595) sobre dos jóvenes
                            amantes, Romeo Montesco y Julieta Capuleto, cuyas familias en Verona sostienen una antigua
                            enemistad. Su amor apasionado y secreto, sellado con un matrimonio rápido, se enfrenta al
                            destino y al odio familiar, culminando en un doble suicidio que finalmente reconcilia a sus
                            familias.</td>
                        <td title="Categoría">Romance</td>
                        <td title="Precio">$500</td>
                        <td title="Stock disponible">3</td>
                        <td class="celda-boton" title="Opciones del usuario">
                            <button type="button" onclick="window.location.href='edit.php'" class="btn btn-editar"
                                title="Editar usuario seleccionado">
                                <ion-icon name="pencil-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
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
            <p>© 2025 Ink & Paper. Todos los derechos reservados.</p>
            <a href="javascript:void(0)">ACCESIBILIDAD</a>
            <a href="javascript:void(0)">TÉRMINOS DE USO</a>
            <a href="javascript:void(0)">COOKIES</a>
        </div>

    </footer>



</body>

</html>