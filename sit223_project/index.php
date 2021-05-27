<?php

/*****************************
  SIT223 Project
  Cloud Group 01-1
  14/05/2021

  Index file

  This is the main webpage that
  contains the form for selecting
  car makes and models
******************************/

  error_reporting(-1);

  include('inc/config.php');

  if(isset($_POST['submit']))
  {
    $make  = $_POST['make'];
    $model = $_POST['model'];

    include('inc/fetch.php');
  }

  date_default_timezone_set('Australia/Melbourne');

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SIT223 Project - Cloud Group 01-1">
    <meta name="author" content="Anthony George, Austin Faraj, Ben Jones">
    <meta name="author" content="Ben Rogers, Ben Spargo, Xurui Cheng">
    <meta name="company" content="Deakin University">
    <link rel="stylesheet" href="inc/style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <title>SIT223 Project A</title>
  </head>
  <body>
    <div class="container">
    <h1>SIT223 Project A</h1>
    <h1>Cloud Group 01-1</h1>
    <form class="form-container" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
      <label>Make</label>
      <input type="text" name="make" placeholder="make">
      <br>
      <label>Model</label>
      <input type="text" name="model" placeholder="model">
      <button class="submit" type="button" name="submit">Submit</button>
    </form>
  </div>
  </body>
</html>
