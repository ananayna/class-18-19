<?php
include_once './backend_inc/header.php';
?>
<div class="container-fluid">
    <form class="row my-5" action="./../controlers/categorycreate.php" method="POST" >
        
        <div class="col-lg-6 mx-auto">
        <p class="text-primary"><?php 
                if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success">'.$_SESSION['success']."</div>";
                }
            ?></p>
              <p class="text-danger"><?php 
                if(isset($_SESSION['failed'])){
                    echo '<div class="alert alert-worning">'.$_SESSION['failed']."</div>";
                }
            ?></p>
            <label for="">Enter category name</label>
            <input name="name" class="form-control mb-4" type="text">
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
unset($_SESSION['errors'],$_SESSION['success'],$_SESSION['failed'])
?>