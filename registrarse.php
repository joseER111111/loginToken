<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa; /* Cambiamos el color de fondo de la página */
        }

        /* Nuevos estilos para centrar el formulario */
        section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contenedor {
            width: 400px;
        }

        /* Agregamos estilos para los iconos de usuario y contraseña */
        .input-contenedor {
            position: relative;
            margin-bottom: 1em;
        }

        .input-contenedor i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
        }

        .input-contenedor input {
            padding-left: 30px; /* Ajustamos el espacio para el icono */
        }
    </style>

    <title>Ejercicio Practico 1. Gestion de Usuarios</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand">Práctica 1</a>
            <!-- Puedes agregar más enlaces al navbar según sea necesario -->
            <a class="navbar-brand" href="index.php">regresar</a>
        </div>
    </nav>

    <!-- Contenedor para centrar el formulario -->
    <section>
        <div class="contenedor">
            <div class="formulario">
                <form action="encriptado.php" method="post" class="login">
                    <h2 class="mb-4">Crea tu cuenta</h2>

                    <div class="mb-3 input-contenedor">
                        <label for="user_email">Correo:</label>
                        <i class="fa-solid fa-envelope fa-sm"></i>
                        <input type="email" id="user_email" name="user_email" class="form-control" required>
                    </div>

                    <div class="mb-3 input-contenedor">
                        <label for="user_password">Contraseña:</label>
                        <i class="fa-solid fa-lock fa-sm"></i>
                        <input type="password" id="user_password" name="user_password" class="form-control" required>
                    </div>

                    <div class="mb-3 input-contenedor">
                        <label for="user_name">Usuario:</label>
                        <i class="fa-solid fa-user fa-sm"></i>
                        <input type="text" id="user_name" name="user_name" class="form-control" required>
                    </div>

                    <div class="mb-3 registrar">
                        <input type="submit" value="Registrar" id="boton" class="btn btn-danger w-100">
                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS y Popper.js (opcional, según tus necesidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua/C5XfJiz93n9Z6xurv8FArOgqD98z9bp0yJI5R5PR4s/bfgEZDSE6S6"
        crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
