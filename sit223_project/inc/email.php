<?php
/*****************************
  SIT223 Project
  Cloud Group 01-1
  2/04/2021

  Email file
******************************/

  $name = "Cloud_Group_01-1";
  $toEmail = 'info@cyberhypermeganet.com.au';
  $subject = 'Recall Notification';
  $body =
   '<h2>New Recall for '.$make.'</h2></div>
    <h3>Model:</h3>
    <h3>'.$model.'</h3>';

  $headers = "MIME-Version: 1.0" ."\r\n";
  $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
  $headers .= "From: ". $name ." <info@cyberhypermeganet.com.au>". "\r\n";

  if(mail($toEmail, $subject, $body, $headers)){
    $msg = 'email sent';
    echo($msg);
  } else {
    echo("Not sent");
  }

?>
