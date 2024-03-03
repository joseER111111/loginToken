<?php
session_start();
include('conexion.php');

$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

$query = "INSERT INTO usuario(user_email, user_password, user_name) value('$user_email','$user_password','$user_name')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
        alert("registro exitoso");
        window.location = "index.php";
        </script>
    ';
}else{
    echo '
    <script>
    alert("registro incorrecto");
    window.location = "index.php";
    </script>
';
}

mysql_close($conexion);
?>