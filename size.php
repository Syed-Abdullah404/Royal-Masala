<?php
include('./header.php');
error_reporting(0);
?>


    <!-- add Modal -->
    <div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="mb-3">

                  


                        <div class="modal-body">


                        <label for="formFile" class="form-label">Products</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="edit_size" name="edit_product">
                                <option disable>Select product</option>
                                <?php
                                $query = $connection->query("SELECT * FROM `products` where status = 'Active'");
                                while ($product = $query->fetch_assoc()) {
                                    ?>
                                    <option selected><?php echo $product['name']?></option>
                                  

                                <?php
                                }
                                ?>
                            </select>







                            <label for="formFile" class="form-label">Size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="size_add">


                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="size" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit Modal -->
    <!-- <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Size</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                       >
                                       <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" id="formFile">
                                
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Status</label>
                                    <select class="form-select mb-3" aria-label="Default select example">
                                        <option selected>Inactive</option>
                                        <option value="1">Deactive</option>
                                    </select>
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                   <textarea name="" class="form-control" ></textarea>
                                </div>
                               
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div> -->
    <!-- delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        <input type="hidden" name="size_id" id="delete_id">
          <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
          <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete_size" class="btn btn-danger">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-3">Add Size</h4>
                    <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Size<i class="fa fa-plus ms-2"></i></button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>


                                <tr>
                                 
                                    <th scope="col">#</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                           $id  = 1;
                                $query = $connection->query('SELECT * FROM `size`');
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td scope="row" style="display: none;"><?php echo $row['id']?></td>
                                        <td scope="row"><?php echo $id++ ;?></td>
                                        <td><?php echo $row['size'] ?></td>
                                        <td><?php echo $row['productName'] ?></td>
                                        <td>
                                        <button type="button" class="btn btn-lg btn-lg-square btn-danger delbtn"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
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





<script>
    $('.delbtn').on('click', function() {
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#delete_id').val(data[0]);


    });
    </script>


<?php
    include('footer.php');

    ?>


<!-- size -->
<?php


if (isset($_POST['size'])) {
  $size = $_POST['size_add'];
  $product = $_POST['edit_product'];
  if ($size == "") {
    echo "<script>window.location='size.php'</script>";
  } else {
    

    $query = $connection->query("SELECT * FROM `products` WHERE name = '$product'");
       

    while($a = $query->fetch_assoc()){

  $productId = $a['id'];
  $productName = $a['name'];



    // $query = $connection->query("INSERT INTO `size`(`size`) VALUES ()");
    $query = $connection->query("INSERT INTO `size`(`size`, `productId` ,`productName`) VALUES ('$size',' $productId','$productName')");
    echo "<script>window.location='size.php'</script>";
  }
}
}
?>


<!-- delete size -->

<?php

if(isset($_POST['delete_size'])){
  
  $id  = $_POST['size_id'];
// echo "<script>alert('$id')</script>";
  $query = $connection->query("DELETE FROM size where id =". $id);
  
   echo "<script>window.location='size.php'</script>";
  
}

?>