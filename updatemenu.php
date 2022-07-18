<?php
    $id=$_POST["edit_id"];
    $name= $_POST["edit_name"];
    $price=$_POST["edit_price"];
    $oldimage = $_POST['edit_oldprofile'];
    $newimage = $_FILES['edit_newimage'];

    if ($newimage['size']>0) {
        $basepath = 'photo/';
        $fullpath = $basepath.$newimage['name'];
        move_uploaded_file($newimage['tmp_name'],$fullpath);
        $image = $newimage['name'];
    } else {
        $image=$oldimage;
    }
    

$menu = [
    "name" => $name,
    "price" => $price,
    "image" => $image
];
$JsonData = file_get_contents('menulist.json');
$data_arr = json_decode($JsonData);

$data_arr[$id] = $menu;
$updatedJsonData = json_encode($data_arr,JSON_PRETTY_PRINT);
        
file_put_contents('menulist.json',$updatedJsonData);
header("location: adminUI.php");

?>