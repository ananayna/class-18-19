<?php
include_once './backend_inc/header.php';
include './../env.php';
$query ="SELECT * FROM categories";
$result = mysqli_query($conn,$query);
$categories = mysqli_fetch_all($result, 1);
?>
<div class="container mt-5">
 <h3 class="text-primary mb-4"> category List</h3>
 <hr class="w-80" />
    <section id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <table id="dtable" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr class="bg-primary text-light text-center">
                                    <th>Sl. no</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($categories as $key=> $category){
                                     
                                ?>
                                 <tr>
                                    <td scope="row" class="text-center"><?= ++$key?></td>
                                    <td scope="row"class="text-center"><?= $category['name']?></td>

                                    <td><div class="btn_group-sm">
                                        <a href="./category_edit.php?id=<?= $category['id']?>" class="btn btn-warning btn-sm "><i class="fas fa-edit"></i></a>
                                        <a href="./../controlers/categorydelete.php?id=<?= $category['id']?>" class="btn btn-danger btn-sm delete_btn"><i class="fas fa-trash"></i></a>
                                    </td>
                                    </div>
                                </tr>
                                <?php
                                }
                                ?>                               
                            <tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </section>
<?php
include_once './backend_inc/footer.php';
unset($_SESSION['success']);
?>