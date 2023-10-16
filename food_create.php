<?php
include_once './backend_inc/header.php';
include './../env.php';
$query ="SELECT * FROM categories";
$result = mysqli_query($conn,$query);
$categories = mysqli_fetch_all($result, 1);

?>
<div class="container-fluid">
    <form class="row my-5" action="./../controlers/foodcreate.php" method="POST"  enctype="multipart/form-data">
        
        
        <p class="text-primary col-lg-12"><?php 
                if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success">'.$_SESSION['success']."</div>";
                }
            ?></p>
              <p class="text-danger"><?php 
                if(isset($_SESSION['failed'])){
                    echo '<div class="alert alert-worning">'.$_SESSION['failed']."</div>";
                }
            ?></p>
        <div class="col-lg-12">
            <label for="">Enter food name</label>
            <input name="name" class="form-control mb-4" type="text">
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['name_error'])? $_SESSION['errors']['name_error']:"";?>
            </p>
        </div>
        <div class="col-lg-12 ">
            <label for="">Enter food decription</label>
            <textarea name="description" class="form-control mb-4" type="text"></textarea>
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['description_error'])? $_SESSION['errors']['description_error']:"";?>
            </p>
        </div>
        <div class="col-lg-6 ">
            <label for="">Enter food price</label>
            <input name="price" class="form-control mb-4" type="text">
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['price_error'])? $_SESSION['errors']['price_error']:"";?>
            </p>
        </div>
        <div class="col-lg-6">
            <label for="">Enter food image</label>
            <input name="image" class="form-control mb-4" type="file">
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['image_error'])? $_SESSION['errors']['image_error']:"";?>
            </p>
        </div>
        <div class="col-lg-12">
            <select name="category_id" class="form-control mb-4">
            <?php 
                                foreach($categories as $key=> $category){
                                     
                                ?>
                                 <tr>
                                    <option value="<?= $category['id']?>"><?= $category['name']?></option>
                                </tr>
                                <?php
                                }
                                ?> 
                
            </select>
        </div>
        <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary w-25">Add new food</button>
        </div>
    </form>
</div>
<?php
include_once './backend_inc/footer.php';
unset($_SESSION['errors'],$_SESSION['success'],$_SESSION['failed'])
?>