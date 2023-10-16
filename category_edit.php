<?php
include_once './backend_inc/header.php';
include './../env.php';
$category_id = $_REQUEST['id'];
$query ="SELECT * FROM categories WHERE id = '$category_id'";
$result = mysqli_query($conn,$query);
$category_edit = mysqli_fetch_assoc($result);


?>
<div class="container-fluid">
    <form class="row my-5" action="./../controlers/categoryupdate.php?id=<?= $category_edit['id'] ?>" method="POST">
        <h3 class="text-primary mb-4 col-lg-12 mx-auto">Update your category</h3>
        <hr class="w-80" />
        <div class="col-lg-6 mx-auto">
            <?php 
                if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success">'.$_SESSION['success']."</div>";
                }
            ?>
              <?php 
                if(isset($_SESSION['failed'])){
                    echo '<div class="alert alert-worning">'.$_SESSION['failed']."</div>";
                }
            ?>
            <label for="">Enter category name</label>
            <input value="<?= $category_edit['name'] ?>" name="name" class="form-control mb-4" type="text">
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['name_error'])? $_SESSION['errors']['name_error']:"";?>
            </p>
        </div>
        <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary w-25"> Uplode your category</button>
        </div>
        
    </form>
</div>
<?php
include_once './backend_inc/footer.php';
unset($_SESSION['errors'], $_SESSION['success']);
?>