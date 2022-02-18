<?php
   date_default_timezone_set('America/Sao_Paulo');
   $username = "root";
   $password = "";
   $params = "mysql:host=localhost;dbname=sysuni";
   
   try 
     {
     $pdo = new PDO($params, $username, $password);
     // set the PDO error mode to exception
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connected successfully"; 
     }
   catch(PDOException $e)
     {
     echo "Connection failed: " . $e->getMessage();
     }

     ?>