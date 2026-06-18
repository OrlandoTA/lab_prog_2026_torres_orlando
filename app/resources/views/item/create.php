<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="../../../../public/app/js/script.js"></script>

    <link rel="stylesheet" href="/lab_prog_2026_torres_orlando/public/app/css/style.css?v=1" type="text/css">

    <title>Ink & Paper-Alta de productos</title>
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

    <main class="seccion-principal" title="Sección principal">

        <nav aria-label="Breadcrumb" class="breadcrumb">
            <ol>
                <li class="first">
                    <a href="../home/index.php">
                        <ion-icon name="home-outline" title="Inicio"></ion-icon>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="../item/index.php"> 
                        <ion-icon name="basket-outline" title="Productos"></ion-icon>
                        Gestión de Productos
                    </a>
                </li>
                <li class="last active"><span aria-current="page">Alta de producto</span></li>
            </ol>
        </nav>

        <div class="titulo-modulo">
            <h1 title="Formulario de alta de producto">Alta de producto</h1>
        </div>

        <form action="" class="formulario-alta" title="Formulario para registrar un producto" autocomplete="off" method="post">

            <div class="fila">
                <div class="campo mitad">
                    <label for="nombre" title="Ingrese el nombre del producto">Nombre<span class="obligatorio">*</span></label>
                    <input type="text" id="nombre" required minlength="3" maxlength="50"
                    pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]+"
                    title="Escriba el nombre del producto (mínimo 3 caracteres, solo letras y números)" name="nombre">
                </div>

                <div class="campo mitad">
                    <label for="codigo" title="Ingrese el código del producto">Código<span class="obligatorio">*</span></label>
                    <input name="codigo" type="text" id="codigo" required minlength="2" maxlength="20" pattern="[A-Za-z0-9]+"
                    title="Escriba el código del producto (solo letras y números, sin espacios)">
                </div>
            </div>

            <div class="campo">
                <label for="text-descripcion" title="Descripción del producto">Descripción del producto <span class="obligatorio">*</span></label>
                <textarea name="descripcion" id="text-descripcion" class="descripcion-producto" maxlength="200" minlength="10"
                    title="Ingrese una descripción del producto (entre 10 y 200 caracteres)">
                </textarea>
            </div>

            <div class="campo">
                <label title="Seleccione una o más categorías">Categoria <span class="obligatorio">*</span></label>
                <div class="grupo-checkbox">
                    <label title="Categoría Romance">
                        <input type="checkbox" name="categoriaId" value="Romance"> Romance
                    </label>
                    <label title="Categoría Comedia">
                        <input type="checkbox" name="categoriaId" value="comedia"> Comedia
                    </label>
                    <label title="Categoría Thriller">
                        <input type="checkbox" name="categoriaId" value="thriller"> Thriller
                    </label>
                    <label title="Categoría Terror">
                        <input type="checkbox" name="categoriaId" value="terror"> Terror
                    </label>
                    <label title="Categoría Suspenso">
                        <input type="checkbox" name="categoriaId" value="Suspenso"> Suspenso
                    </label>
                </div>
            </div>

            <div class="fila">
                <div class="campo mitad">
                    <label for="input-precio" title="Ingrese el precio del producto">Precio: $<span class="obligatorio">*</span></label>
                    <input name="precio" type="number" id="input-precio" required min="0" max="1000000" step="0.01"
                        title="Ingrese el precio en números (mayor o igual a 0)">
                </div>
                <div class="campo mitad">
                    <label for="input-stock" title="Ingrese el stock disponible">Stock<span class="obligatorio">*</span>:</label>
                    <input name="stock" type="number" id="input-stock" required min="0" max="10000" title="Ingrese la cantidad disponible (número entero mayor o igual a 0)">
                </div>
            </div>

            <div class="campo-botones  botones-alta">
                <button type="submit" class="btn-guardar" id="btn-guardarCambios" disabledtitle="Guardar cambios realizados">
                    <ion-icon name="save-outline"></ion-icon>
                        Crear producto
                </button>
                <button  type="button"  onclick="window.location.href='index.php'" class="btn-volver" title="Volver al listado de usuarios">
                    <ion-icon name="arrow-back-circle-outline"></ion-icon>
                    Volver
                </button>

            </div>

            <p id="mensaje-exitoso" class="oculto" title="Mensaje de confirmación">
                El producto fue registrado con exito
            </p>

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
                    <p >© 2025 Ink & Paper. Todos los derechos reservados.</p>
                    <a href="javascript:void(0)">ACCESIBILIDAD</a>
                    <a href="javascript:void(0)">TÉRMINOS DE USO</a>
                    <a href="javascript:void(0)">COOKIES</a>
                </div>
               
            </footer>


</body>

</html>