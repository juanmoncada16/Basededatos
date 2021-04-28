<?php
$servidor="localhost";
$usuario="root";
$clave="";
$basededatos="banco";

$conectar = mysqli_connect($servidor, $usuario, $clave, $basededatos);

if(!$conectar){
    echo"No se encontro el Servidor";
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Registro Banco</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Banco</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Registradas.php">Registradas<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Transacciones.php">Trasaccion</a>
      </li>
    </ul>
  </div>
</nav>

  <div class="container">
    <div class="text-center"><h1>REGISTRO BANCARIO</h1></div>
    <div class="py-4"></div>
    <form action="#" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Cedula</label>
          <input type="int" class="form-control" name="cedula" placeholder="Cedula">
        </div>
        <div class="form-group col-md-6">
          <label>Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group">
        <label>Dirección</label>
        <input type="text" class="form-control" name="direccion" placeholder="Dirección">
      </div>
      <div class="form-group">
        <label>Telefono</label>
        <input type="int" class="form-control" name="telefono" placeholder="Telefono">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Ocupacion</label>
          <input type="text" class="form-control" name="ocupacion">
        </div>
        <div class="form-group col-md-6">
        <label>Estado Civil</label>
          <input type="text" class="form-control" name="e_civil">
        </div>
      </div>
      <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
    </form>

    </div>

</body>
</html>



<?php

if(isset($_POST['guardar'])){

    $cedula=$_POST["cedula"];
    $nombre=$_POST["nombre"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $ocupacion=$_POST["ocupacion"];
    $e_civil=$_POST["e_civil"];
    $Cuenta= rand (000000000,999999999);

    $insertarCliente = "INSERT INTO cliente VALUES('$cedula',
                                                    '$nombre',
                                                    '$direccion',
                                                    '$telefono',
                                                    '$ocupacion',
                                                    '$e_civil',
                                                    '$Cuenta')";

    $ejecutar = mysqli_query($conectar, $insertarCliente);


      if(!$ejecutar){
          echo"Hubo algun error";
          }   
  }
?>