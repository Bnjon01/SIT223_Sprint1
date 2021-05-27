<?php

/*****************************
  SIT223 Project
  Cloud Group 01-1
  Anthony George 220180567
  28/04/2021

  Configuration file

  This file supplies all config
  data required to connect to
  the database
******************************/

  $host = 'localhost';
  $user = 'root';
  $pwd = file_get_contents("C:\\xampp\\p.txt");
  $dbname = 'CyberHyperMegaNet';

  // Set DSN
  $dsn = 'mysql:host='. $host . ';dbname='. $dbname;

  // Create a PDO instance
  try {
    $pdo = new PDO($dsn, $user, $pwd);
  } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

  // Set default attribute
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  date_default_timezone_set('Australia/Melbourne');
?>
