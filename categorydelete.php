<?php

include_once './../env.php';
$category_id = $_REQUEST['id'];
$query = "DELETE FROM categories WHERE id= '$category_id' ";
$result = mysqli_query($conn, $query);
header("Location: ./../backend/category_list.php");

?>