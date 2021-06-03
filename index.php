<?php

include_once 'conexion.php';

// LEER INFORMACION DE LA BASE DE DATOS
$sql_leer = 'SELECT * FROM t_colores';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

// AGREGAR INFORMACION A LA BASE DE DATOS
if ($_POST) {
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];

    $sql_agregar = 'INSERT INTO t_colores (color, descripcion) VALUES (?, ?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($color, $descripcion));
    header('Location: index.php');
}

if($_GET){
    $id = $_GET['id'];
    $sql_unico = 'SELECT * FROM t_colores WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetch();

    //var_dump($resultado_unico);
}


?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/18130c8aad.js" crossorigin="anonymous"></script>
    <title>CRUD de Colores en PHP</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach ($resultado as $dato) : ?>
                    <div class="alert alert-<?php echo $dato['color'] ?> text-uppercase" role="alert">
                        <?php echo $dato['color'] ?> - <?php echo $dato['descripcion'] ?>
                        <a href="index.php?id=<?php echo $dato['id'] ?>" class="float-end">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-md-6">
                <?php if(!$_GET): ?>
                    <h2>AGREGAR ELEMENTO</h2>
                    <form method="POST">
                        <input type="text" class="form-control mt-1" placeholder="Ingrese nombre del color" required name="color">
                        <input type="text" class="form-control mt-1" placeholder="Ingrese una descripcion el color" name="descripcion">
                        <button class="btn btn-primary mt-3">Agregar</button>
                    </form>
                <?php endif ?>

                <?php if($_GET): ?>
                    <h2>EDITAR ELEMENTO</h2>
                    <form method="GET" action="editar.php">
                        <input type="text" class="form-control mt-1" name="color" value="<?php echo $resultado_unico['color']?>">
                        <input type="text" class="form-control mt-1" name="descripcion" value="<?php echo $resultado_unico['descripcion']?>">
                        <input type="hidden" class="form-control mt-1" name="id" value="<?php echo $resultado_unico['id']?>">
                        <button class="btn btn-primary mt-3">Actualizar</button>
                    </form>
                <?php endif ?>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>