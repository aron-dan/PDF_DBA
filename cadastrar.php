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
  <h2>Cadastrar PDF</h2>

  <?php

  //Receber dados do Form
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


  //Acessa o if quando o usuário clica no botão
  if (!empty($dados['CadArquivoPdf'])) {
    var_dump($dados);

    //Receber aruqivo PDF
    $arquivo_pdf = $_FILES['arquivo_pdf'];

    var_dump($arquivo_pdf);

    //validação de arquivo PDF
    if ($arquivo_pdf['type'] == 'application/pdf') {
      //conversão de arquivo para Blob
      $arquivo_pdf_blob = file_get_contents($arquivo_pdf['tmp_name']);

      $query_arquivo = "INSERT INTO arquivos (numero_contrato, nome_documento, arquivo_pdf) VALUES (:numero_contrato, :nome_documento, :arquivo_pdf)";
      $cad_arquivo = $conn->prepare($query_arquivo);
      $cad_arquivo->bindParam(":numero_contrato", $dados['contrato']);
      $cad_arquivo->bindParam(":nome_documento", $arquivo_pdf['name']);
      $cad_arquivo->bindParam(":arquivo_pdf", $arquivo_pdf_blob);
      $cad_arquivo->execute();

      if ($cad_arquivo->rowCount()) {
        echo "<p style='color: green;'>Arquivo cadastrado com Sucesso</p>";
      } else {
        echo "<p style='color: #f00;'>Erro, Arquivo não cadastrado.</p>";
      }
    } else
      echo "<p style='color: #f00;'>Erro, Extensão de arquivo inválida, necessário enviar arquivo PDF.</p>";
  }



  ?>

  <form method="post" action="" enctype="multipart/form-data">
    <label>contrato:</label>
    <input type="text" name="contrato"><br><br>

    <label>Arquivo PDF:</label>
    <input type="file" name="arquivo_pdf"><br><br>

    <input type="submit" name="CadArquivoPdf" value="Enviar">
  </form>

</body>

</html>