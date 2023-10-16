<?php
session_start();
include_once './../env.php';
$name = trim($_REQUEST['name']);
$errors=[];

//name Validation
if (empty($name)) {
    $errors['name_error'] = 'Name is required';
} elseif (strlen($name) > 100) {
    $errors['name_error'] = 'Name can not be more than 100 Character.';
}

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    var_dump($errors);
    header("Location: ./../backend/category_create.php");
}else{
    $query = "INSERT INTO categories(name) VALUES ('$name')";
    $result = mysqli_query($conn,$query);
    if($result){
        $_SESSION['success'] = 'Benner insert successfully';
        header("Location: ./../backend/category_create.php");
    }else{
        $_SESSION['failed'] = 'Benner is not insert';
        header("Location: ./../backend/category_create.php");
    }
}