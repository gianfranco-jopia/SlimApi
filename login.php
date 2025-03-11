<?php
session_start();

// Simulación de credenciales
$usuarios = [
    ["email" => "admin@testexample.com", "password" => "123"],
    ["email" => "user@testexample.com", "password" => "password"]
];

$email = $_POST['email'];
$password = $_POST['password'];

foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email && $usuario['password'] === $password) {
        $_SESSION['usuario'] = $email;
        header("Location: listarUsuarios.php");
        exit();
    }
}

// Si no coincide, redirigir al login con error
header("Location: index.html?error=1");
exit();