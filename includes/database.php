<?php

$db = mysqli_connect('esteticasalon.eu', 'admin_1452', '@92Rsm1a8', 'bd_admin_1452');

// $db = mysqli_connect(
//     $_ENV['DB_HOST'],
//     $_ENV['DB_USER'],
//     $_ENV['DB_PASS'] ?? '',
//     $_ENV['DB_BD']
// );


$db->set_charset("utf8");

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "error de depuración: " . mysqli_connect_error();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}