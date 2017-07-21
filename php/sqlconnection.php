<?php
  function printResult($result_set){
    while(($row = $result_set->fetch_assoc()) != false){  //fetch_assoc - доставание значений
        print_r($row);                                       //$row - ассоциативный массив
        echo "<br>";
    }
    echo "Колличество записей равно: ".$result_set->num_rows."<br><hr>";
  }

  $mysqli = new mysqli("localhost", "root", "", "mybase");  //there is openning connection ip, login, password, db
  $mysqli->query("SET NAMES 'utf8'"); //query - отправляет запрос в бд. Установка кодировки для запросов
  $success = $mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`) VALUES ('123', '".md5("123")."', '".time()."')");//между INTO и VALUES кавычки стоят как ё Ё
echo "$success<br>";

  $result_set = $mysqli->query("SELECT * FROM `users`");
  printResult($result_set);

  $mysqli->close(); //закрытие конекшина
 ?>
