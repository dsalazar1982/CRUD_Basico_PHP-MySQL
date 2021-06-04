<?php

$link = 'mysql:host=10.0.0.51;dbname=db_colores';
$usuario = 'dba_user';
$constraseña = 'dba_user@MariaDB2020*';

try {
    $pdo = new PDO($link, $usuario, $constraseña);
} catch (PDOException $e) {
    print "¡Error en conexion!: " . $e->getMessage() . "<br/>";
    die();
}
