<?php

include_once './../env.php';
$food_id = $_REQUEST['id'];
            // for count
$select_query ="SELECT * FROM foods";
$result = mysqli_query($conn,$select_query);
$add = mysqli_fetch_all($result, 1);
                    // for image delete uploads file
$select_query1 ="SELECT * FROM foods WHERE id= '$banner_id'";
$result1 = mysqli_query($conn,$select_query1);
$data = mysqli_fetch_assoc($result1);
$image_path ='./../uploads/'.$data['image'];

if(count($add) > 1){
    if(file_exists($image_path)){
        unlink($image_path);
    }
    $query = "DELETE FROM foods WHERE id= '$food_id' ";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: ./../backend/food_list.php");
    }
}else{
    header("Location: ./../backend/food_list.php");
}


?>