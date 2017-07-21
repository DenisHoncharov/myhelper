<?php
  $message= "Hello there is test email";//content message
  $to = "admin@gmail.com";              //email where we write
  $subject = "main theam";              //theam of message
  $from = "user@mail.ru";               //user email
  $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plane; charset=utf-8\r\n"; //for proper post work
  mail($to, $subject, $message, $headers);
  header("Location: index.html");
 ?>
