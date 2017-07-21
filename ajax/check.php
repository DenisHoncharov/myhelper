<?php
    sleep(1);
    if($_POST["name"] == "Admin"){
        echo "FAIL";
    }else{
        echo $_POST["name"];
    }
 ?>
