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

  <form method="post" action="">
    <label>Numero do contrato</label>
    <input type="text" name="id">
    <input type="submit" name="getArquivoPdf">
  </form>

  <?php
  if(isset($_POST['id'])){
    $id_get = $_POST['id'];


  $query_arquivos = "SELECT id, numero_contrato, nome_documento
                          FROM arquivos
                          WHERE id = $id_get
                          ORDER BY id DESC";
  $result_arquivos = $conn->prepare($query_arquivos);
  $result_arquivos->execute();

  if (($result_arquivos) and ($result_arquivos->rowCount() != 0)) {
    while ($row_aquivo = $result_arquivos->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row_aquivo);
      extract($row_aquivo);
      //echo "<br>ID: $id <br>";
      echo "Numero do contrato: $numero_contrato <br>";
      echo "nome do Documento: <a href='visualizar_arquivo.php?id=$id' target='_blank'>$nome_documento</a> <br>";
    }
  } else {
    echo "<p style='color: red;'>Erro. Nenhum arquivo encontrado</p>";
  }
}
  ?>



</body>

</html>