<?php
//index.php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$error = '';

if (isset($_POST["login"])) {
    try {
        $connect = new PDO("mysql:host=localhost;dbname=toke", "root", "root");
        // Resto del código para interactuar con la base de datos
    //    echo "Conexión exitosa";
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    if (empty($_POST["user_email"])) {
        $error = 'Please Enter Email Details';
    }elseif (empty($_POST["user_password"])) {
        $error = 'Please Enter Password Details';
    }else {
        $query = "SELECT * FROM usuario WHERE user_email = ?";
        $statement =$connect->prepare($query);
        $statement->execute([$_POST["user_email"]]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            if ($data['user_password'] === $_POST['user_password']) {
                $key = '1a3LM3W966D6QTJ5BJb9opunkUcw_d09NCOIJb9QZTsrneqOICoMoeYUDcd_NfaQyR787PAH98Vhue5g938jdkiyIZyJICytKlbjNBtebaHljIR6-zf3A2h3uy6pCtUFl1UhXWnV6madujY4_3SyUViRwBUOP-UudUL4wnJnKYUGDKsiZePPzBGrF4_gxJMRwF9lIWyUCHSh-PRGfvT7s1mu4-5ByYlFvGDQraP4ZiG5bC1TAKO_CnPyd1hrpdzBzNW4SfjqGKmz7IvLAHmRD-2AMQHpTU-hN2vwoA-iQxwQhfnqjM0nnwtZ0urE6HjKl6GWQW-KLnhtfw5n_84IRQ';
                $token = JWT::encode(
                    array(
                        'iat'      => time(),
                         'nbf'     => time(),
                         'exp'     => time() +3600,
                         'data' =>array(
                            'user_id'  =>  $data['user_id'],
                            'user_name' => $data['user_name']
                         )
                         ),
                         $key,
                         'HS256'
                    );
                setcookie("token", $token, time() + 3600, "/", "", true, true);
                header('location:welcome.php');

            }else{
            $error = 'Wrong Password';
            }
        }else{
            $error = 'Wrong Email Addres';
        }
    }
}
?>

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

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Añadimos sombra */
        }

        .card-header {
            background-color: #dc3545; /* Cambiamos el color del encabezado a rojo */
        }

        .btn-danger {
            background-color: #dc3545; /* Cambiamos el color del botón a rojo */
            border-color: #dc3545; /* Cambiamos el color del borde del botón a rojo */
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
            <a class="navbar-brand" href="registrarse.php"><ion-icon name="person-add-outline"></ion-icon> Registrarse</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mt-5 mb-5">Ejercicio Practico 1. Gestion de Usuarios</h1>
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <?php
                if ($error !== '') {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                ?>
                <div class="card">
                    <div class="card-header text-white">Login</div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="user_email" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="user_password" class="form-control" />
                            </div>
                            <div class="text-center">
                                <input type="submit" name="login" class="btn btn-danger" value="Login" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y Popper.js (opcional, según tus necesidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua/C5XfJiz93n9Z6xurv8FArOgqD98z9bp0yJI5R5PR4s/bfgEZDSE6S6"
        crossorigin="anonymous"></script>

        
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>