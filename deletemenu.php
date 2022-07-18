<?php

    $id= $_POST["id"];

$JsonData = file_get_contents('menulist.json');

$data_arr = json_decode($JsonData);

unset($data_arr[$id]);
$JsonData= json_encode($data_arr,JSON_PRETTY_PRINT);

file_put_contents('menulist.json',$JsonData);

?>