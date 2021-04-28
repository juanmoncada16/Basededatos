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
  <title>Transferencia Bancaria</title>
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
    <div class="text-center"><h1>TRANSACCION BANCARIA</h1></div>
    <div class="py-4"></div>
    <form action="#" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Cuenta de Origen</label>
          <input type="int" class="form-control" name="C_origen" placeholder="Origen">
        </div>
        <div class="form-group col-md-6">
          <label>Cuenta de Destino</label>
          <input type="text" class="form-control" name="C_destino" placeholder="Destino">
        </div>
      </div>
      <div class="form-group">
        <label>Monto a Transferir</label>
        <input type="text" class="form-control" name="Monto" placeholder="0.00">
      </div>
      <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
    </form>

    <div class="py-4"></div>
    <div class="text-center"><h1>HISTORIAL</h1></div>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Transferencia</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cuenta Origen</th>
      <th scope="col">Cuenta Destino</th>
      <th scope="col">Monto</th>
    </tr>
  </thead>
    <?php
      $consulta = "SELECT * FROM transaccion";
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
              <td>'.$fila[2].'</td>
              <td>'.$fila[3].'</td>
              <td>'.$fila[4].'</td>
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

if(isset($_POST['enviar'])){

    $IDTransaccion= rand (00000,99999);
    $Fecha= date_default_timezone_get();
    $C_origen=$_POST["C_origen"];
    $C_destino=$_POST["C_destino"];
    $Monto=$_POST["Monto"];

    $insertarCliente = "INSERT INTO transaccion VALUES('$IDTransaccion',
                                                    '$Fecha',
                                                    '$C_origen',
                                                    '$C_destino',
                                                    '$Monto')";

    $ejecutar = mysqli_query($conectar, $insertarCliente);

      if(!$ejecutar){
          echo"Hubo algun error";
          } 
  }
?>