<?php
include_once 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$query_arquivo = "SELECT arquivo_pdf
                          FROM arquivos
                          WHERE id=:id
                          ORDER BY id DESC";
$result_arquivo = $conn->prepare($query_arquivo);
$result_arquivo->bindParam(':id', $id);
$result_arquivo->execute();

if (($result_arquivo) and ($result_arquivo->rowCount() != 0)) {
  $row_aquivo = $result_arquivo->fetch(PDO::FETCH_ASSOC);
  //var_dump($row_aquivo);
  extract($row_aquivo);
  header("Content-Type: application/pdf");
  echo $arquivo_pdf;
} else {
  echo "<p style='color: red;'>Erro. Nenhum arquivo encontrado</p>";
}
