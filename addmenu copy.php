<?php
if(isset($_POST["submit"])){
    $name= $_POST["name"];
    $price=$_POST["price"];
    $image=$_FILES["image"];
}

$basepath='photo/';
$fullpath=$basepath.$image['name'];
move_uploaded_file($image['tmp_name'],$fullpath);

$menu=[
    'name'=>$name,
    'price'=>$price,
    'image'=>$image['name']
];

$JsonData = file_get_contents('menulist.json');
if(!$JsonData){
    $JsonData='[]';
}
$data_arr = json_decode($JsonData);
array_push($data_arr,$menu);
$JsonData= json_encode($data_arr,JSON_PRETTY_PRINT);

file_put_contents('menulist.json',$JsonData);
header("location: adminUI.php");
?>