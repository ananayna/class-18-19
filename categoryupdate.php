<?php
session_start();
include_once './../env.php';
$category_id = $_REQUEST['id'];
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
    header("Location: ./../backend/category_edit.php?id=$category_id");
}else{
    $query = "UPDATE categories SET name='$name' WHERE id = '$category_id'";
    $result = mysqli_query($conn,$query);
    if($result){
        $_SESSION['success'] = 'Benner insert successfully';
        header("Location: ./../backend/category_edit.php?id=$category_id");
    }else{
        $_SESSION['failed'] = 'Benner is not insert';
        header("Location: ./../backend/category_edit.php?id=$category_id");
    }
}