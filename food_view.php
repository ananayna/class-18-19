<?php
include_once './backend_inc/header.php';
include './../env.php';
$food_id = $_REQUEST['id'];
$query ="SELECT * FROM foods WHERE id = '$food_id'";
$result = mysqli_query($conn,$query);
$food_view = mysqli_fetch_assoc($result);
$category_id =  $food_view['category_id'];
// for category name & id
$queryselect ="SELECT * FROM categories WHERE id = '$category_id'";
$result1 = mysqli_query($conn,$queryselect);
$category_view = mysqli_fetch_assoc($result1);
?>


        <section class="mt-5">
            <div class="container">
                <div class="row ">
                    <div class="card-header col-lg-3 mx-auto">
                        <h1 class="text-warning text-center my-4"><b><i><?= $food_view['name'] ?></i></b> </h1>
                        <p class="bg-dark text-center text-light">Price - <?= $food_view['price'] ?>/-</p>
                    </div>
                    <div class="card-header col-lg-3 mr-auto ">
                        <p class=""><img src="./../uploads/<?= $food_view['image']?>" width="200px" ></p>
                    </div>
                            
                    <div class="col-lg-9 mx-auto">
                        <div class="card">
                   
                            <div class="card-header">
                                <p>
                                <i class="fas fa-info"> =  </i> <?= $food_view['description'] ?>
                                </p>
                                <p>
                                    Category- <?= $category_view['name'] ?>
                                </p>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>

<?php
include_once './backend_inc/footer.php';

?>