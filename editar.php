<?php

include_once 'conexion.php';

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];


$sql_editar = 'UPDATE t_colores SET color=?, descripcion=? WHERE id=?';
$sentencia_editar = $pdo -> prepare($sql_editar);
$sentencia_editar -> execute(array($color, $descripcion, $id));


