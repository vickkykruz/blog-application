<?php

    try {
      $db =  new PDO('mysql:dbhost=localhost;port= 3306;dbname=kruz; charset=utf8', 'root','');
    }
    catch(Exception $e) {
        die("Could not connect to database");
    };
?>