<?php

include_once 'conexion.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM t_colores WHERE id=?';
$sentecia_eliminar = $pdo -> prepare($sql_eliminar);
$sentecia_eliminar -> execute(array($id));

// Cerrar conexion de la base de datos
$pdo = null;
$sentencia_eliminar = null;

header('Location: index.php');