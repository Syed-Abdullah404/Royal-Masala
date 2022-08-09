<?php
include('header.php');
?>


<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Expenses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="amount">


                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="date">


                    </div>
                    <div class="mb-3">


                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="desc" class="form-control"></textarea>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_expense" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->

<div class="modal fade " id="expenseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Expenses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="edit_id" name="expenseidedit" >
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name">


                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="edit_amount" name="amount">


                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Date</label>
                        <input type="date" class="form-control" id="edit_date" name="date">


                    </div>
                    <div class="mb-3">


                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="edit_desc"></textarea>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_expense" class="btn btn-primary">Edit</button>
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
        <input type="hidden" name="expense" id="delete_id">
          <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
          <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete_expense" class="btn btn-danger">Yes</button>
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
                <h4 class="mb-3">Add Expenses</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Expenses<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>


                            <tr>
                                <th scope="col" style="display:none;">#</th>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>

                                <th scope="col">Description</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id  = 1;
                            $query = $connection->query('SELECT * FROM `expense`');
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td scope="row" style="display: none;"><?php echo $row['id'] ?></td>
                                    <td scope="row"><?php echo $id++; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['amount'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-lg btn-lg-square btn-success expensebtn" data-bs-toggle="modal" data-bs-target="#expenseModal">
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
       $('.delbtn').on('click', function() {
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#delete_id').val(data[0]);


    });



    $('.expensebtn').on('click', function() {
        $('#expenseModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        // console.log(data);
        $('#edit_id').val(data[0]);
        $('#edit_name').val(data[2]);
        $('#edit_amount').val(data[3]);
        $('#edit_date').val(data[4]);
        $('#edit_desc').val(data[5]);


    });
</script>
<?php
include('footer.php');



if (isset($_POST['add_expense'])) {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $description = $_POST['desc'];
    if ($name == "" || $amount == "" || $date == "" || $description == "") {
        echo "<script>window.location='expense.php'</script>";
    } else {

        $query = $connection->query("INSERT INTO `expense`(`name`,`amount`,`date`,`description`) VALUES ('$name','$amount','$date','$description')");
        echo "<script>window.location='expense.php'</script>";
    }
}
?>


<?php

if (isset($_POST['delete_expense'])) {

    $id  = $_POST['expense'];

    $query = $connection->query("DELETE FROM expense where id =" . $id);

    echo "<script>window.location='expense.php'</script>";
}

?>

<?php

if (isset($_POST["edit_expense"])) {

    $id = $_POST["expenseidedit"];
    $name = $_POST["name"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];
    $desc = $_POST["description"];


    $update = $connection->query("UPDATE `expense` SET `name`='$name',`amount`='$amount',`date`='$date',`description`='$desc' WHERE id= $id");
    if ($update) {

        echo "<script>window.location='expense.php?msg=update-sucessfully'</script>";
    }
}

?>