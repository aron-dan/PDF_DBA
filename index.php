<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Importer</title>
  <style>
    body{background-color: black; color: white;}
  </style>
</head>
<body>
  
  <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dados);

    if(!empty($dados['CadArquivopdf'])){
      $arquivo_pdf = $_FILES['arquivo_pdf'];

      if($arquivo_pdf['type'] == 'aplication/pdf'){
        $arquivo_pdf_blob = file_get_contents($arquivo_pdf['tmp_name']);

      }
      else{echo "<p>Erro<p/>";}
    }

    
  ?>

  <form method="post" action="" enctype="multipart/form-data">
    <label>Nome:</label>
    <input type="text" name="name"><br><br>

    <label>Arquivo PDF:</label>
    <input type="file" name="arquivo_pdf"><br><br>

    <input type="submit" name="submit" value="Enviar">
  </form>
  
</body>
</html>