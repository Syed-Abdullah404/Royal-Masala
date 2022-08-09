<?php
include('header.php');
?>

<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Packing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="quantity">


                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="price">


                    </div>
                    <div class="mb-3">


                        <!-- <label for="exampleInputPassword1" class="form-label">Total Price</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"> -->

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_packing" class="btn btn-primary">Add</button>
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
                <h5 class="modal-title" id="exampleModalLabel"> Edit Packing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <input type="hidden" name="packing_id" id="edit_id">
                        <label for="exampleInputEmail1" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="edit_quantity" name="quantity">


                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" class="form-control" id="edit_price" name="price">

                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_packing" class="btn btn-primary">Edit</button>
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
                    <input type="hidden" name="packingidelete" id="delete_id">
                    <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
                    <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
                <button type="submit" name="delete_packing" class="btn btn-danger">Yes</button>
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
                <h4 class="mb-3">Add Packing</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Packing<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="display:none;">#</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>

                                <th scope="col">Total Price</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            $query = $connection->query('SELECT * FROM `packing`');
                            foreach ($query as $value) {


                            ?>
                                <tr>
                                    <td scope="row"><?php echo $id++; ?></td>
                                    <td scope="row" style="display: none;"><?php echo $value['id'] ?></td>
                                    <td scope="row"><?php echo $value['quantity'] ?></td>
                                    <td scope="row"><?php echo $value['price'] ?></td>
                                    <td scope="row"><?php echo $value['total'] ?></td>

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
<script>
    // del button
    $('.delbtn').on('click', function() {
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#delete_id').val(data[1]);


    });



    $('.editbtn').on('click', function() {
        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#edit_id').val(data[1]);
        $('#edit_quantity').val(data[2]);
        $('#edit_price').val(data[3]);
        $('#edit_total').val(data[4]);


    });
</script>

<?php

include('footer.php');

if (isset($_POST['add_packing'])) {
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total =  $quantity * $price;


    $query = $connection->query("INSERT INTO `packing`(`quantity`, `price`, `total`) VALUES ('$quantity','$price','$total')");
    if ($query) {

        echo "<script>window.location='packing.php?msg=update-sucessfully'</script>";
    }
}


if (isset($_POST['delete_packing'])) {
    $id = $_POST['packingidelete'];

    $query = $connection->query('DELETE FROM `packing` WHERE id = ' . $id);
    if ($query) {
        echo "<script>window.location='packing.php?msg=update-sucessfully'</script>";
    }
}




if (isset($_POST['edit_packing'])) {



    $id = $_POST["packing_id"];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total =  $quantity * $price;


;

    $update = $connection->query("UPDATE `packing` SET `quantity`='$quantity',`price`='$price',`total`='$total' WHERE id =".$id);
    if ($update) {

        echo "<script>window.location='packing.php?msg=update-yes'</script>";
    }
}


?>