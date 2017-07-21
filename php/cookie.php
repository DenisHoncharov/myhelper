<?php
    $num = (isset($_COOKIE["num"])) ? $_COOKIE["num"] : 0;
    $num++;
    setcookie("num", $num, time() + 7);   //1 - name, 2 - value, 3 - time of live;
    echo "user reload page $num.";
?>
