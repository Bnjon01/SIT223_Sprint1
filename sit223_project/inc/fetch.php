<?php

/*****************************
  SIT223 Project
  Cloud Group 01-1
  Anthony George 220180567
  28/04/2021

  Fetch file

  This file fetches the post
  data from the database
  and echo's it to the screen
******************************/

  header("Cache-Control: no-cache, no-store, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: 0");

  include('config.php');

  $sql = "SELECT $make, $model FROM cars";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($posts as $result) {
    echo($result['make']);
    echo($result['model']);
  }

?>
