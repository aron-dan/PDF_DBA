<?php
 $host  = "database-2.cnlp6ym2ohlb.us-east-1.rds.amazonaws.com";
 $user = "admin";
 $pass = "teste123";
 $dbname = "database-2";
 $port = 3306;

 try{
  //conexão de porta
  $conn = new PDO("mysql:host=$host;port=$port;dbname=", $dbname,$user,$pass);

  //conexão sem porta
  //$conn = new PDO("mysql:host=$host;dbname=", $dbname,$user,$pass);
 } catch(PDOException$err){
  echo "conexão estabelecida", $err->getMessage();
 }

 
 ?>