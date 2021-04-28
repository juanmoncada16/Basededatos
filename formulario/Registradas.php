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
  <title>Personas Registradas</title>
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
    <div class="text-center"><h1>PERSONAS REGISTRADAS</h1></div>
    <div class="py-4"></div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Cedula</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Ocupacion</th>
      <th scope="col">Cuenta</th>
    </tr>
  </thead>
    <?php
      $consulta = "SELECT * FROM cliente";
      $ejecutarConsulta = mysqli_query($conectar, $consulta);
      $verFilas = mysqli_num_rows($ejecutarConsulta);
      $fila = mysqli_fetch_array($ejecutarConsulta);

      if(!$ejecutarConsulta){
        echo"Error en Mostrar Datos";
      } else{
        if($verFilas<1){
          echo"<tr><td>Sin Registro</td></tr>";
        }else{
          for($i=0; $i<=$fila; $i++){
            echo'
            <tr>
              <td>'.$fila[0].'</td>
              <td>'.$fila[1].'</td>
              <td>'.$fila[3].'</td>
              <td>'.$fila[4].'</td>
              <td>'.$fila[6].'</td>
            <tr>
            ';
            $fila = mysqli_fetch_array($ejecutarConsulta);
          }
        }
      }


    ?>
  </table>

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

    $insertarCliente = "INSERT INTO cliente VALUES('$cedula',
                                                    '$nombre',
                                                    '$direccion',
                                                    '$telefono',
                                                    '$ocupacion',
                                                    '$e_civil')";

    $ejecutar = mysqli_query($conectar, $insertarCliente);

      if(!$ejecutar){
          echo"Hubo algun error";
          } 
  }
?>