<?php

$link = 'mysql:host=10.0.0.51;dbname=db_colores';
$usuario = 'user_dba';
$constraseña = 'user_dba@MariaDB2020*';

try {
    $pdo = new PDO ($link, $usuario, $constraseña);
    echo "Conexion exitosa!";
    
} catch (PDOException $e) {
    print "¡Error en conexion!: " . $e->getMessage() . "<br/>";
    die();    
}