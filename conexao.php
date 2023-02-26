<?php
 $host  = "database-1.cfducwcmbwpa.sa-east-1.rds.amazonaws.com";
 $user = "admin";
 $pass = "B6P13xVWlj34acYZwSXq";
 $dbname = "PDFDBBA";
 $port = 3306;

 try{
  //conexão de porta
  $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname,$user,$pass);

  //conexão sem porta
  //$conn = new PDO("mysql:host=$host;dbname=", $dbname,$user,$pass);

  //Mensagem para saber se a conexão foi estabbelecida 
  //echo "SUCESSO!!";
 } catch(PDOException$err){
  echo "Conexão com Banco de dados falhou!!", $err->getMessage();
 }

 
 ?>