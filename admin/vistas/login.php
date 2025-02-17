
<!DOCTYPE html> <!-- Define el tipo de documento como HTML5 -->
<html lang="es"> <!-- Comienza el documento HTML y establece el idioma en español -->
<head>
    <meta charset="utf-8"> <!-- Establece la codificación de caracteres en UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Asegura que Internet Explorer use el último motor de renderizado disponible -->
    <title>Alkosto_inventario</title> <!-- Título de la página -->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!-- Configuración de la vista para dispositivos móviles -->

    <!-- Vinculación de hojas de estilo CSS -->
    <link rel="stylesheet" href="../admin/public/css/bootstrap.min.css"> <!-- Bootstrap CSS para diseño responsivo -->
    <link rel="stylesheet" href="../admin/public/css/font-awesome.css"> <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="../admin/public/css/AdminLTE.min.css"> <!-- Tema AdminLTE para diseño de plantillas de administración -->
    <link rel="stylesheet" href="../admin/public/css/blue.css"> <!-- Estilo adicional para AdminLTE -->
    <link rel="shortcut icon" href="../admin/public/img/favicon.ico"> <!-- Icono de la página -->

    <style>
        /* Estilo para el cuerpo del documento */
        body {
            background: url('../vistas/fondo.jpg') no-repeat center center fixed; /* Imagen de fondo */
            background-size: cover; /* Ajusta la imagen para cubrir toda la pantalla */
            color: #333; /* Color del texto */
            font-family: 'Arial', sans-serif; /* Fuente del texto Arial */
            margin: 0; /* Elimina márgenes por defecto */
            display: flex; /* Utiliza Flexbox para centrar contenido */
            justify-content: center; /* Centra contenido horizontalmente */
            align-items: center; /* Centra contenido verticalmente */
            height: 100vh; /* Altura de la vista completa */
        }

        /* Estilo para la caja de inicio de sesión */
        .login-box {
            background: rgba(0, 0, 0, 0.7); /* Fondo semitransparente */
            border-radius: 10px; /* Bordes redondeados */
            padding: 30px; /* Espaciado interno */
            width: 100%; /* Ancho completo */
            max-width: 400px; /* Ancho máximo */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5); /* Sombra para efecto 3D */
            text-align: center; /* Centra el contenido dentro de la caja */
        }

        /* Estilo para el logo dentro de la caja de inicio de sesión */
        .login-logo a {
            color: #fff; /* Color del texto del logo */
            font-size: 24px; /* Tamaño de fuente del logo */
            text-decoration: none; /* Sin subrayado */
        }

        /* Estilo para el mensaje dentro de la caja de inicio de sesión */
        .login-box-msg {
            margin: 20px 0; /* Margen superior e inferior */
            font-size: 18px; /* Tamaño de fuente */
            color: #fff; /* Color del texto */
        }

        /* Estilo para el grupo de formularios */
        .form-group {
            margin-bottom: 20px; /* Margen inferior */
            position: relative; /* Posicionamiento relativo */
        }

        /* Estilo para los campos del formulario */
        .form-control {
            border-radius: 5px; /* Bordes redondeados */
            padding: 10px; /* Espaciado interno */
            border: none; /* Sin borde */
            background-color: #333; /* Fondo gris oscuro */
            color: #fff; /* Color del texto */
            width: 80%; /* Ancho completo */
        }

        /* Estilo para el icono de retroalimentación del formulario */
        .form-control-feedback {
            position: absolute; /* Posicionamiento absoluto */
            top: 50%; /* Alineación vertical */
            right: 10px; /* Alineación horizontal */
            transform: translateY(-50%); /* Centro el icono verticalmente */
            color: #ccc; /* Color del icono */
        }

        /* Estilo para el botón de inicio de sesión */
        .btn-primary {
            background-color: #007bff; /* Color de fondo del botón */
            border-color: #007bff; /* Color del borde del botón */
            padding: 10px; /* Espaciado interno */
            border-radius: 5px; /* Bordes redondeados */
            width: 80%; /* Ancho completo */
            font-size: 16px; /* Tamaño de fuente */
            border: none; /* Sin borde */
        }

        /* Estilo para el botón de inicio de sesión al pasar el ratón */
        .btn-primary:hover {
            background-color: #0056b3; /* Color de fondo al pasar el ratón */
            border-color: #0056b3; /* Color del borde al pasar el ratón */
        }

        /* Estilo para el pie de página dentro de la caja de inicio de sesión */
        .login-footer {
            margin-top: 20px; /* Margen superior */
        }

        /* Estilo para los enlaces dentro del pie de página */
        .login-footer a {
            color: #00bfff; /* Color del texto del enlace */
            text-decoration: none; /* Sin subrayado */
        }

        /* Estilo para los enlaces dentro del pie de página al pasar el ratón */
        .login-footer a:hover {
            text-decoration: underline; /* Subrayado al pasar el ratón */
        }
    </style>
</head>
<body class="hold-transition login-page"> <!-- Clase para la transición de la página de inicio de sesión -->
    <div class="login-box"> <!-- Comienza la caja de inicio de sesión -->
        <div class="login-logo"> <!-- Sección del logo dentro de la caja de inicio de sesión -->
            <a href="#"><b>Inicio de</b> sesión </a> <!-- Enlace del logo con texto -->
        </div>
        <div class="login-box-body"> <!-- Comienza el cuerpo de la caja de inicio de sesión -->
            <p class="login-box-msg">Ingrese sus datos de acceso</p> <!-- Mensaje de bienvenida -->
            <form method="post" id="frmAcceso"> <!-- Comienza el formulario -->
                <div class="form-group has-feedback"> <!-- Grupo de campo de formulario con retroalimentación -->
                    <input type="text" id="logina" name="logina" class="form-control" placeholder="Cedula"> <!-- Campo de entrada de texto para el usuario -->
                    <span class="fa fa-user form-control-feedback"></span> <!-- Icono de usuario -->
                </div>
                <div class="form-group has-feedback"> <!-- Grupo de campo de formulario con retroalimentación -->
                    <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Contraseña"> <!-- Campo de entrada de contraseña -->
                    <span class="fa fa-key form-control-feedback"></span> <!-- Icono de llave -->
                </div>
                <div class="row"> <!-- Comienza una fila para el botón -->
                    <div class="col-xs-12"> <!-- Columna de ancho completo -->
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button> <!-- Botón de envío -->
                    </div>
                </div>
            </form>
            <div class="login-footer"> <!-- Comienza el pie de página dentro de la caja de inicio de sesión -->
                <!-- Puedes agregar enlaces o información adicional aquí -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../public/js/jquery-3.1.1.min.js"></script> <!-- Incluye la biblioteca jQuery -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script> <!-- Incluye la biblioteca Bootstrap -->
    <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script> <!-- Incluye la biblioteca Bootbox -->
    
    <script type="text/javascript" src="scripts/login.js"></script> <!-- Incluye el script de inicio de sesión -->
</body>
</html>
