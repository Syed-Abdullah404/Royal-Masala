<?php
include('./header.php');

?>


<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" name="name">

                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="fileToUpload">


                        <div class="mb-3">

                          
                            <label for="formFile" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="quantity">

                        </div>
                        <div class="mb-3">

                            <label for="formFile" class="form-label">Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="status">
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>

                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="text" class="form-control"></textarea>

                        </div>


                    </div>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addProducts" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- edit Modal -->


    <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name">

                            <label for="formFile" class="form-label">Image</label>
                         <input type="file" id="edit_newimage" name="edit_newimage" class="form-control mb-3" name="fileToUpload" > 
                             <input type="hidden" name="edit_oldimage"  id="edit_oldimage">
                     
                      
                             
                          
                        </div>
                        <div class="mb-3">

                         
                            <label for="formFile" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="edit_quantity" name="edit_quantity">

                        </div>
                        <div class="mb-3">

                            <label for="formFile" class="form-label">Status</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="edit_status" name="edit_status">
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>

                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea  class="form-control" id="edit_desc" name="edit_desc"></textarea>

                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit_product" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- delete Modal -->
<div class="modal fade " id="myModaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">

                    <input type="hidden" name="products" id="id" value="">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="delete_product" class="btn btn-primary">Yes</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Add Products</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Products<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Image name</th>
                          
                                <th scope="col">Quantity</th>

                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id  = 1;
                            $query = $connection->query('SELECT * FROM `products`');
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td scope="row" style="display: none;"><?php echo $row['id'] ?></td>
                                    <td scope="row"><?php echo $id++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><img src="img/products/<?php echo $row['image'] ?>" alt="" width="180px" height="110px"></td>
                                    <td><?php echo $row['image'] ?></td>
                             
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['text']; ?></td>

                                    <td><span class="badge rounded-pill bg-danger "><?php echo $row['status']; ?></span></td>
                                    <td>
                                       
                                        <button type="button" class="btn btn-lg btn-lg-square btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-lg-square btn-danger delbtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->


<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->

<!--  Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.delbtn').on('click', function() {
            $('#myModaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#id').val(data[0]);


        });


    
        $('.editbtn').on('click', function() {
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#edit_id').val(data[0]);
            $('#edit_name').val(data[2]);
            $('#edit_oldimage').val(data[4]);
         
            $('#edit_quantity').val(data[5]);
            $('#edit_desc').val(data[6]);
            $('#edit_status').val(data[7]);


        });
    });
</script>












<?php

//If upload button is clicked ...
if (isset($_POST["addProducts"])) {
    $name = $_POST["name"];
    // $size = $_POST["size"];   
    $quantity = $_POST["quantity"];
    $status = $_POST["status"];
    $description = $_POST["text"];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "img/products/" . $filename;
    $extension = substr($filename, strlen($filename) - 4, strlen($filename));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else{
    
    //     $query = $connection->query("SELECT * FROM `size` WHERE size = '$size'");
       

    //     while($a = $query->fetch_assoc()){
    
    //   $sizeId = $a['id'];
  
      
        // Get all the submitted data from the form

        $sql = "INSERT INTO `products`(`name`, `image`,  `quantity`, `status`, `text`) VALUES ('$name','$filename', '$quantity','$status','$description')";
    }
        // Execute query
        mysqli_query($connection, $sql);

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
             echo "<script>window.location='product.php'</script>";
        } else{
            echo "<h3>  Failed to upload image!</h3>";
        
    }
}

?>


<?php

if (isset($_POST['delete_product'])) {

    $id  = $_POST['products'];

    $query = $connection->query("DELETE FROM products where id =" . $id);

    echo "<script>window.location='product.php'</script>";
}

?>




<?php

//If upload button is clicked ...
if (isset($_POST["edit_product"])) {
   
    $edit_id = $_POST["edit_id"];
    
   
    $name = $_POST["edit_name"];

 

    $quantity = $_POST["edit_quantity"];
    
    $status = $_POST["edit_status"];
    
    $description = $_POST["edit_desc"];
  $old_image =   $_POST['edit_oldimage'];
    $filename = $_FILES["edit_newimage"]["name"];
    $tempname = $_FILES["edit_newimage"]["tmp_name"];

    
    
    
    $showImage = "";
    if($filename == ""){
        $showImage = $old_image;
        echo "<script>window.location='product.php'</script>";
    }else{
        $showImage = $filename;
        }
  
    $folder = "img/products/" . $showImage;
    $extension = substr($showImage, strlen($showImage) - 4, strlen($showImage));
    // allowed extensions
    $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else{

        // Get all the submitted data from the form
        $sql = $connection->query("UPDATE `products` SET `name`='$name',`image`='$showImage',`quantity`='$quantity',`status`='$status',`text`='$description' WHERE id=".$edit_id);
 
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
        unlink("img/products/" . $old_image);
            echo "<script>window.location='product.php'</script>";
        } else{
            echo "<h3>  Failed to upload image!</h3>";
        
    }
}
}
?>