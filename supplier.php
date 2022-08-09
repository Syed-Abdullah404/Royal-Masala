<?php
include('header.php');
?>

<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">


                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Location</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="location">


                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">payment</label>

                            <select class="form-select mb-3" aria-label="Default select example" name="pay">

                                <option value="cash">Cash</option>
                                <option value="cash creadit">cash credit</option>
                            </select>
                        </div>


                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_supplier" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->


<div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="edit_id" name="id">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Location</label>
                        <input type="text" class="form-control" id="edit_location" name="location">


                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">payment</label>

                        <select class="form-select mb-3" aria-label="Default select example" name="pay" id="edit_payment">

                            <option value="cash">Cash</option>
                            <option value="cash credit">cash credit</option>
                        </select>
                    </div>
                    <div class="mb-3">


                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" id="edit_desc"></textarea>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_supplier" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
        <input type="hidden" name="supplier_id" id="delete_id">
          <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
          <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete_supplier" class="btn btn-danger">Yes</button>
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
                <h4 class="mb-3">Add Supplier</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Supplier<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Payment</th>

                                <th scope="col">Description</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id  = 1;
                            $query = $connection->query('SELECT * FROM `supplier`');
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td scope="row" style="display: none;"><?php echo $row['id'] ?></td>
                                    <td scope="row"><?php echo $id++; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['pay'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-lg btn-lg-square btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-pen"></i>
                                        </button>
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
    // del button
    $('.delbtn').on('click', function() {
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#delete_id').val(data[0]);


    });



    $('.editbtn').on('click', function() {
        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#edit_id').val(data[0]);
        $('#edit_name').val(data[2]);
        $('#edit_location').val(data[3]);
        $('#edit_payment').val(data[4]);
        $('#edit_desc').val(data[5]);


    });

</script>
<?php
include('footer.php');
?>


<?php
if (isset($_POST['add_supplier'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $pay = $_POST['pay'];
    $description = $_POST['description'];

    if ($name == "" || $location == "" || $pay == "" || $description == "") {
        echo "<script>window.location='supplier.php?msg=adfdsf'</script>";
    } else {

        $query = $connection->query("INSERT INTO `supplier`(`name`, `location`, `pay`, `description`) VALUES ('$name','$location','$pay','$description')");
        echo "<script>window.location='supplier.php'</script>";
    }
}


if (isset($_POST['delete_supplier'])) {

    $id  = $_POST['supplier_id'];

    $query = $connection->query("DELETE FROM supplier where id =" . $id);

    echo "<script>window.location='supplier.php'</script>";
}



if (isset($_POST["edit_supplier"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $pay = $_POST["pay"];
    $desc = $_POST["desc"];


    $update = $connection->query("UPDATE `supplier` SET `name`='$name',`location`='$location',`pay`='$pay',`description`='$desc' WHERE id=" . $id);
    if ($update) {

        echo "<script>window.location='supplier.php?msg=update-sucessfully'</script>";
    }
}

?>