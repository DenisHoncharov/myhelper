<?php
session_start();
  if(isset($_POST["send"])){
    $from = htmlspecialchars($_POST["from"]);
    $to = htmlspecialchars($_POST["to"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $_SESSION["from"]=$from;
    $_SESSION["to"]=$to;
    $_SESSION["subject"]=$subject;
    $_SESSION["message"]=$message;

    $error_from = "";
    $error_to = "";
    $error_subject = "";
    $error_message = "";

    if($from == "" || !preg_match ("/@/", $from)){    //preg_match - устойчивое выражение
      $error_from = "Используйте корректный емаил";
      $error = true;
    }
    if($to == "" || !preg_match ("/@/", $from)){    //preg_match - устойчивое выражение
      $error_to = "Используйте корректный емаил";
      $error = true;
    }
    if(strlen($subject) == 0){    //strlen - длина строки
      $error_subject = "Введите тему сообщения";
      $error = true;
    }
    if(strlen($message) == 0){    //strlen - длина строки
      $error_message = "Введите сообщение";
      $error = true;
    }
    if(!$error){
      $subject = "=?utf-8?B?".base64_encode($subject)."?="; //что бы маил гу понимал что введено
      $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; carset=utf-8\r\n";
      mail($to, $subject, $message, $headers);
      header("Location: success.php?send=1");
      exit;
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Обратная связь</title>
  </head>
  <body>
    <h2>Форма обратной связи</h2>
    <form name="feedback" action="" method="post">
      <label>User</label><br>
      <input type="text" name="from" value="<?=$_SESSION["from"] ?>"/>
      <span style="color:red"><?=$error_from?></span>
      <br>
      <label>To</label><br>
      <input type="text" name="to" value="<?php echo  $_SESSION["to"] ?>"/>
      <span style="color:red"><?=$error_to?></span>
      <br>
      <label>Theam</label><br>
      <input type="text" name="subject" value="<?php echo  $_SESSION["subject"] ?>"/>
      <span style="color:red"><?=$error_subject?></span>
      <br>
      <label>Message</label><br>
      <textarea name="message" cols="40" rows="10"><?php echo  $_SESSION["message"] ?></textarea>
      <span style="color:red"><?=$error_message?></span>
      <br>
      <input type="submit" name="send" value="Send">
    </form>
  </body>
</html>
