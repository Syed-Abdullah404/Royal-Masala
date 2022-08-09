<?php
include('header.php');
?>
<style>
    label {
        margin-bottom: 7px;
        font-weight: 500;
        font-size: 20px;
    }

    .mm {
        margin: 25px;

    }

    .mn {
        margin-top: -35px;
    }
</style>










<!-- delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        <input type="text" name="contract" id="delete_id">
          <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
          <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete_contract" class="btn btn-danger">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- add Model -->
<div class="body-section">
    <div class="container">
        <div class="card mm">
            <div class="card-header border-0">
                <h3 class="card-title">Contract</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> Add Contract
                </button>

                <div class="container mt-1">



                    <hr>
                    <div class="card-body table-responsive">
                        <table id="table" class="table table-bordered pt-2">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Paying term</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php

                                $ids = $_GET['idy'];
                                $sqlname = mysqli_query($connection, "select * from employee where id='$ids'");
                                $row_name = mysqli_fetch_assoc($sqlname);
                                $name = $row_name['emp_name'];



                                $selectq = "select * from contract where name='$name'";
                                $runq = mysqli_query($connection, $selectq);
                                while ($rowq = mysqli_fetch_assoc($runq)) {

                                ?>
                                    <tr id="record-4">
                                        <td><?php echo $rowq['id'] ?></td>
                                        <td><?php echo $rowq['name'] ?></td>
                                        <td><?php echo $rowq['paying_term'] ?></td>
                                        <td><?php echo $rowq['total'] ?></td>
                                        <td><?php echo $rowq['date'] ?></td>


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
            <!-- flex-item -->
        </div>
        <!-- /flex-container -->
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addContract" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Employee Name</label>
                            <?php
                            $id = $_GET['idy'];
                            $sql = mysqli_query($connection, "select * from employee where id='$id'");
                            $row = mysqli_fetch_assoc($sql);

                            ?>
                            <input type="text" class="form-control" name="ename" value="<?php echo $row['emp_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="catergory">Paying term:</label>
                            <select name="paying_term" class="form-select">

                                <?php
                                $select_cat = "select contract from employee where id=" . $id;
                                $run_cat = mysqli_query($connection, $select_cat);

                                while ($row = mysqli_fetch_assoc($run_cat)) {
                                ?>
                                    <option value="<?php echo $row['contract']; ?>"><?php echo $row['contract']; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="product">Salary:</label>
                            <select name="salary" class="form-select">

                                <?php
                                $select = "select salary from employee where id =" . $id;
                                $run = mysqli_query($connection, $select);

                                while ($rows = mysqli_fetch_assoc($run)) {
                                ?>
                                    <option value="<?php echo $rows['salary']; ?>"><?php echo $rows['salary']; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="costperproduct">Total Pack</label>
                            <input type="text" class="form-control" placeholder="Total pack " name="total_pack" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" placeholder="Date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Status/Message</label>
                            <input type="text" class="form-control" placeholder="message" name="status">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <!-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <form id="editContract" method="POST">
                                        <input type="hidden" name="update_id" id="update_id">
                                        <div class="modal-body">
                                                        
                                            <div class="form-group">
                                            <label for="cat">Select Category:</label>
                                            <select name="cat" class="form-select" id="cat">
                                                        <option>Select Category</option>
                                                        <?php
                                                        //     $select_query="select * from categories";
                                                        //     $run=mysqli_query($connection,$select_query);
                                                        // while($rows=mysqli_fetch_assoc($run)){
                                                        ?>
                                                                 <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option> -->
    <?php
    // }
    ?>
    </select>

</div>

<!-- <div class="form-group">
    <label for="product">Select Product:</label>
    <select name="product" class="form-select" id="product">
        <option>Select Category</option>
        <?php
        $select = "select name from products";
        $run = mysqli_query($connection, $select);

        while ($rows = mysqli_fetch_assoc($run)) {
        ?>
            <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
        <?php
        }
        ?>
    </select> -->

<!-- </div>
<div class="form-group">
    <label for="cost">Cost per Product</label>
    <input type="text" class="form-control" id="cost" placeholder="Cost per Product" name="cost" required>
</div>
<div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="datec" placeholder="Date" name="datec" required>
</div>

</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
</div>
</form>
</div>

</div>
</div> 
</div> -->
<!-- Edit Modal END -->

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
include 'footer.php';
?>
<script>
    $(document).ready(function() {
        $(".delete_btn_ajax").click(function(e) {
            e.preventDefault();
            var deleteid = $(this).closest('tr').find('.delete_id_value').val();
            //alert(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "deletecontract.php",
                            data: {
                                "delete_btn_set": 1,
                                "deleteid": deleteid,
                            },
                            success: function(response) {
                                swal("Deleted!", "Your Data is Deleted", "success", {
                                    button: "Ok!",
                                }).then((result) => {
                                    location.reload();
                                });

                            }
                        });
                    }
                });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#examplemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#update_id').val(data[0]);
            $('#cat').val(data[1]);
            $('#product').val(data[2]);
            $('#cost').val(data[3]);
            $('#datec').val(data[4]);
        });
    });

    function cat(data) {
        const ajaxreq = new XMLHttpRequest();
        ajaxreq.open('GET', 'http://localhost/htdocs/ali-haider-new/alertdata.php?selectvalue=' + data, 'TRUE');
        ajaxreq.send();
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                document.getElementById('category').innerHTML = ajaxreq.responseText;
            }
        }

    }

    function cate(data) {
        const ajaxreq = new XMLHttpRequest();
        ajaxreq.open('GET', 'http://localhost/htdocs/ali-haider-new/alertdata.php?selectvalue=' + data, 'TRUE');
        ajaxreq.send();
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                document.getElementById('catego').innerHTML = ajaxreq.responseText;
            }
        }

    }
</script>
<?php


if (isset($_POST['submit'])) {
    $name = $_POST['ename'];
    $paying_term = $_POST['paying_term'];
    $salary = $_POST['salary'];
    $status = $_POST['status'];
    $total_pack = $_POST['total_pack'];
    $date = $_POST['date'];
    $total = $total_pack * $salary;

    $insert = $connection->query("INSERT INTO `contract`(`name`, `paying_term`, `salary`, `total_pack`, `total`,`status`, `date`) VALUES ('$name','$paying_term','$salary','$total_pack','$total','$status','$date')");


    if ($insert) {
?>
        <script>
            window.location = "<?php echo 'contract.php?idy=' . $ids ?>";
        </script>
    <?php
    } else {
        echo "<script>alert('Not Inserted') </script>";
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['update_id'];
    $cate = $_POST['cat'];
    $product = $_POST['product'];
    $cost = $_POST['cost'];
    $edate = $_POST['datec'];

    $update = "update contract set category='$cate',product='$product', price='$cost', date='$edate' where id='$id'";
    $run_update = mysqli_query($connection, $update);
    if ($run_update) {
    ?>
        <script>
            window.location = "<?php echo $app_url . '/contract.php' ?>";
        </script>
<?php
    } else {
        echo "<script>alert('Not Updated') </script>";
    }
}
?>


<?php

if (isset($_POST['delete_contract'])) {

    $id  = $_POST['contract'];

    $query = $connection->query("DELETE FROM contract where id =" . $id);
    ?>
    <script>
        window.location = "<?php echo 'contract.php?idy=' . $ids ?>";
    </script>
<?php
}

?>