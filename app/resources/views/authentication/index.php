<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    

    <meta name=“keywords” content=“ink, paper, libro” />
   <link rel="stylesheet" href="../../../../public/app/css/authentication.css" type="text/css">

    <title>Inicio de sesión</title>
</head>
<body id="body-authentication">
    
<form action="<?= APP_URL ?>?controller=authentication&action=login" id="form-authentication" autocomplete="off" method="post">

    <div class="nombre-pagina">
        <ion-icon id="page-icon" name="book-outline" title="Abrir o cerrar barra lateral"></ion-icon>
        <span title="Nombre de la aplicación">Ink & Paper</span>
    </div>



    <div class="titulo">
        <h1>Inicio de sesión</h1>
    </div>
    <div class="campo">
        <label for="username" class="sr-only" id="mail-label">
            Correo Electronico<span class="obligatorio">*</span>
        </label>
        <input type="text" name="username" id="username"     placeholder="correoelectronico@hotmail.com"
            required minlength="5" maxlength="100"
            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}"
            title="Ingrese un correo electrónico válido">

        <label for="password" class="sr-only" id="password-label">Contraseña<span class="obligatorio">*</span></label>
        <input type="password" id="password" placeholder="***************"
            required minlength="8" maxlength="50"
            pattern=".{8,}"
            title="La contraseña debe tener al menos 8 caracteres" name="password" >
    </div>

    <div >
        
    </div>

    <div>
      <button type="submit" id="btn-ingresar">Ingresar</button>
    </div>

</form>
</body>
</html>