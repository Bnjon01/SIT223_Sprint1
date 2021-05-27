<?php

/*****************************
  SIT223 Project
  Cloud Group 01-1
  Anthony George 220180567
  28/04/2021

  Login file

  This page renders the login page
  This assumes an existing Account
  We may need to create a 'create account'
  page if we want to add more users

  ** This file assumes a 'users' table
  containing the username 'admin' and
  hashed password - we would need to
  create this.

******************************/

  error_reporting(-1);

  require('inc/config.php');

  $username = "";
  $msg = '';

  // set the password
  $pwd = 'sit223';

  // get the pepper
  $pepper = file_get_contents("C:\\xampp\\pepper.txt");

  // pepper the password
  $peppered_password = hash_hmac("sha256", $pwd, $pepper);

  // hash the peppered password
  $pwd_hashed = password_hash($peppered_password, PASSWORD_DEFAULT);

  // store the hashed password
  //echo($pwd_hashed);

  // verify the stored hashed password with the peppered password
  if (password_verify($peppered_password, $pwd_hashed)) {
    //echo("Password Matches");
  }

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location: index.php");
    exit;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $msg = "Please enter a username.";
    } else {
        $username = trim(htmlentities($_POST["username"]));
    }

    if(empty(trim($_POST["password"]))){
        $msg = "Please enter your password.";
    } else{
        $password = htmlentities($_POST["password"]);

        $login_password = hash_hmac("sha256", $password, $pepper);

        if(empty($msg)){

          $sel = "SELECT username, password
                  FROM users
                  WHERE username = '$username'";

          $stmt = $pdo->prepare($sel);
          $stmt->execute();
          $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        if(!empty($user[0]['username'])){
          $p = $user[0]['password'];

          if (password_verify($login_password, $p)) {
            $msg = "Password Matches.";
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            if($username === 'admin'){
                header("Location: index.php");
                exit;
            }
          } else {
            $msg = "Password Incorrect.";
          }
        } else {
          $msg = "That username does not exist.";
        }
      }
    }
  include("inc/header.php");
?><div class="container">
    <form class="form" id="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
      <h4 class="title">Log in</h4>

      <?php if($msg != ''):?>
        <div class="msg"><?php echo $msg; ?></div>
      <?php endif ?>

      <input type="username" placeholder="Username" name="username"><br>
      <input type="password" placeholder="Password" name="password"><br>
      <button type="submit" name="submit" value="submit" class="submit" id="submit" >Submit</button>

      <div class="forgot-password">
        <a href="#">Forgot your password?</a>
      </div>

    </form>
    <div id="processing"></div>
  </div>
