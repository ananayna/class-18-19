<?php
include_once './backend_inc/header.php';
include './../env.php';
$food_id = $_REQUEST['id'];
$query ="SELECT * FROM foods WHERE id = '$food_id'";
$result = mysqli_query($conn,$query);
$edit = mysqli_fetch_assoc($result);
$category_id =  $edit['category_id'];
// for category name & id
$queryselect ="SELECT * FROM categories";
$resultc = mysqli_query($conn,$queryselect);
$categories = mysqli_fetch_all($resultc,1);
//var_dump($categories)
?>

<div class="container-fluid">
    <form class="row my-5" action="./../controlers/foodupdate.php?id=<?= $edit['id'] ?>" method="POST" enctype="multipart/form-data">
        <h3 class="text-primary mb-4">Update food</h3>
        <div class="col-lg-12 ">
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
            <label for="">Enter food Name</label>
            <input value="<?= $edit['name'] ?>" name="name" class="form-control mb-4" type="text">
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['name_error'])? $_SESSION['errors']['name_error']:"";?>
            </p>
        </div>
        <div class="col-lg-12">
            <label for="">Enter food Description</label>
            <textarea name="description" class="form-control mb-4" name=""><?= $edit['description'] ?></textarea>
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['description_error'])? $_SESSION['errors']['description_error']:"";?>
            </p>
        </div>


        <div class="col-lg-4">
            <label for="">Enter food price</label>
            <input value="<?= $edit['price'] ?>" name="price" class="form-control mb-4" type="text">
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['price_error'])? $_SESSION['errors']['price_error']:"";?>
            </p>
        </div>
        <div class="col-lg-4">
        <label for="PI"><p> Enter food image</p><img src="./../uploads/<?= $edit['image']?>" 
             class="w-25"></label>
            <input name="image" class="form-control d-none" id="PI" type="file">
            
            <p class="text-danger">
                 <?= isset($_SESSION['errors']['image_error'])? $_SESSION['errors']['image_error']:"";?>
            </p>
        </div>
        <div class="col-lg-4">
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
            <button type="submit" class="btn btn-primary w-25"> Uplode food</button>
        </div>
        
    </form>
</div>
<?php
include_once './backend_inc/footer.php';
unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['failed']);
?>