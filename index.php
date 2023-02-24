<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Importer</title>
  <style>
    body {
      background-color: black;
      color: white;
    }
  </style>
</head>

<body>
  </br><a href="index.php">Listar PDF</a></br>
  <a href="cadastrar.php">Cadastrar PDF</a></br></br>
  <h2>Listar PDF</h2></br>
  <form method="$_GET" action="">
    <label>Numero do contrato</label>
    <input type="text" name="contrato_get">
    <input type="submit" name="getArquivoPdf">
  </form>


</body>

</html>