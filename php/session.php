<?php
  session_start();
  $num = (isset($_SESSION["num"])) ? $_SESSION["num"] : 0;
  $num++;
  $_SESSION["num"] = $num;
  echo "user reload page $num.";
  $cookieNum = $_COOKIE["num"];
  echo "<hr>cookie num = $cookieNum";
  session_destroy(); // delete session
 ?>
