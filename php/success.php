<?php
  session_start();
  if($_GET["send"] == 1)
    echo "<h1>Вы успешно отправили сообщение а емаил:".$_SESSION["to"]."</h1>";
 ?>
