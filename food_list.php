<?php
include_once './backend_inc/header.php';
include './../env.php';
$query ="SELECT * FROM foods";
$result = mysqli_query($conn,$query);
$foods= mysqli_fetch_all($result, 1);

?>
 <div class="container mt-5">
 <h3 class="text-primary mb-4">Food List</h3>
    <hr class="w-80" />
    <section id="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="dtable" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr class="bg-primary text-light text-center">
                                    <th>Sl. no</th>
                                    <th>image</th>
                                    <th>title</th>
                                    <th>Description</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($foods as $key=> $food){
                                     
                                ?>
                                 <tr>
                                    <td scope="row" class="text-center"><?= ++$key?></td>
                                    <td scope="row" class="text" class="text-center"><img src="./../uploads/<?= $food['image']?>" width="70px" > </td>
                                    <td scope="row"class="text-center"><?= $food['name']?></td>
                                    <td scope="row"><?= strlen($food['description']) > 20 ?substr($food['description'],0,20)."...":$food['description']; ?></td>
                                    <td scope="row" class="text-center">
                                    <P><?= $food['price']?>/-</P>
                                    </td>
                                   
                                    <td><div class="btn_group-sm">
                                        <a href="./food_view.php?id=<?= $food['id']?>" class="btn btn-info btn-sm "><i class="fas fa-eye"></i></a>
                                        <a href="./food_edit.php?id=<?= $food['id']?>" class="btn btn-warning btn-sm "><i class="fas fa-edit"></i></a>
                                        <a href="./../controlers/fooddelete.php?id=<?= $food['id']?>" class="btn btn-danger btn-sm delete_btn"><i class="fas fa-trash"></i></a>
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
   </body>


<?php
include_once './backend_inc/footer.php';

?>