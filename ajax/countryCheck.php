<?php
    if($_GET["country"] == 1){
        echo json_encode(array('1' => "Washington", "2" => "Sietl"));
    }else if($_GET["country"] == 2){
        echo json_encode(array('1' => "Paris", "2" => "Marsel"));
    }
 ?>
