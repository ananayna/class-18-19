<?php
session_start();
include_once './../env.php';
$category_id = $_REQUEST['category_id'];
$name = trim($_REQUEST['name']);
$description = trim($_REQUEST['description']);
$price = $_REQUEST['price'];
$image = $_FILES['image'];
$avatarextention = pathinfo($image['name'], PATHINFO_EXTENSION);
$expectextention = ['jpg','png','jpeg','webp'];
$image_size = $image['size'];
$errors=[];

//name Validation
if (empty($name)) {
    $errors['name_error'] = 'name is required';
} elseif (strlen($name) > 100) {
    $errors['name_error'] = 'name can not be more than 100 Character.';
}

//description Validation
if (empty($description)) {
    $errors['description_error'] = 'description is required';
} elseif (strlen($description) > 200) {
    $errors['description_error'] = 'description can not be more than 200 Character.';
}

//cta_text Validation
if (empty($price)) {
    $errors['price_error'] = 'price is required';
}

// image validation
if(!$image_size > 0){
    $errors['image_error']= "image is required";
}elseif(!in_array($avatarextention,$expectextention)){
    $errors['image_error']= "just use jpg, jpeg, png";
}elseif($image_size > 5000000){
    $errors['image_error']= "file size is in 5mb";
}

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header("Location: ./../backend/food_create.php");
}else{
    $image_name = uniqid().'.'.$avatarextention;
    $query= "INSERT INTO foods (category_id,name, description, price, image) VALUES ('$category_id','$name','$description','$price','$image_name')";
    $result = mysqli_query($conn,$query);
    // var_dump($result);
    // exit;
    if($result){
        move_uploaded_file($image['tmp_name'], './../uploads/'.$image_name );
        $_SESSION['success'] = 'food insert successfully';
        header("Location: ./../backend/food_create.php");
    }else{
        $_SESSION['failed'] = 'food is not insert';
        header("Location: ./../backend/food_create.php");
    }
}

?>