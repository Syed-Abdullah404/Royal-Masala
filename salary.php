<?php

include('header.php');
$id = $_GET['ids'];

?>
<style>
  label {
    margin-bottom: 7px;
    font-weight: 500;
    font-size: 20px;
  }

  .mm {
    margin-top: 90px;
  }

  .mn {
    margin-top: -40px;
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
        <input type="text" name="salary_id" id="delete_id">
          <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
          <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete_salary" class="btn btn-danger">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- add Model -->
<div class="body-section">
  <div class="container ">
    <div class="card mm">
      <div class="card-header border-0">
        <h3 class="card-title mb-5 ">Account</h3>
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-outline-success mn float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-plus"></i> Pay Salary
        </button>
        <!-- <button type="button" class="btn btn-outline-primary  mn" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                  <i class="fas fa-gift"></i>  Bonus
                    </button> -->
        <!-- <button type="button" class="btn btn-outline-danger  mn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                  <i class="fas fa-minus"></i>  Deduction
                    </button> -->



        <div class="container mt-1">



          <hr>
          <div class="card-body table-responsive p-0">
            <div class="row py-3">
              <div class="col-md-8 d-flex justify-content-between">






              </div>
              <!-- <div class="col-md-4 justify-content-between">
                                                <input type="date" class="form-control">
                                            </div> -->
            </div>
            <table id="table" class="table table-bordered pt-2">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Salary</th>
                  <th>Original salary</th>
                  <th>Date</th>
                  <th>Operations</th>

                </tr>
              </thead>
              <tbody class="table-light">
                <?php


                $selectq = "SELECT * FROM `salary`";
                $runq = mysqli_query($connection, $selectq);
                while ($rowq = mysqli_fetch_assoc($runq)) {
                ?>
                  <tr>
                    <td><?php echo $rowq['id'] ?></td>
                    <td><?php echo $rowq['salary'] ?></td>
                    <td><?php echo $rowq['original_salary'] ?></td>
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



<!-- Modal salry-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Salary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addPaysalary" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="salary">Salary</label>
              <?php
              $select = $connection->query("select salary from employee where id =" . $id);


              while ($rows = mysqli_fetch_assoc($select)) {
              ?>
                <input type="text" class="form-control" placeholder="Salary" name="salary" value="<?php echo $rows['salary']; ?>" readonly>
              <?php
              }
              ?>
            </div>

            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" placeholder="Date" name="date" required>
            </div>
            <div class="form-group">
              <label for="date">Salary After Deduction</label>
              <input type="text" class="form-control" placeholder="salary" name="original_salary" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="add">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>


<!--  Modal  bonus-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal1Label">Add Bonus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addBonus" method="POST">
          <div class="modal-body">

            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" placeholder="Date" name="bdate" required>
            </div>

            <div class="form-group">
              <label for="bonus">Bonus</label>
              <input type="number" class="form-control" placeholder="Bonus" name="bonus" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="addBonus">Add</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!--  Modal  deduction-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal2Label">Deduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addDeduction" method="POST">
          <div class="modal-body">

            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" placeholder="Date" name="ddate" required>
            </div>

            <div class="form-group">
              <label for="deduction">Deduction Amount</label>
              <input type="number" class="form-control" placeholder="Salary" name="deduction" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="adddeduction">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#myModalEdit').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#name').val(data[1]);
      $('#short').val(data[2]);
      $('#status').val(data[3]);
    });
  });
</script>
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
//pay salary

if (isset($_POST['add'])) {
  $salary = $_POST['salary'];
  $date = $_POST['date'];
  $emp_id = $_GET['ids'];
  $original_salary = $_POST['original_salary'];


  $sql = "INSERT INTO `salary`(`salary`, `date`, `emp_id`,`original_salary`) VALUES ('$salary','$date','$emp_id','$original_salary')";
  $run = mysqli_query($connection, $sql);

  if ($run) {
?>
    <script>
      window.location = "<?php echo 'salary.php?ids=' . $id ?>";
    </script>
  <?php
  } else {
    echo "<script>alert('Not Inserted'); </script>";
  }
}


//bonus
if (isset($_POST['addBonus'])) {
  $sid = $_GET['ids'];
  $date = $_POST['bdate'];
  $bonus = $_POST['bonus'];

  $sqlb = "insert into bonus (date,bonus,emp_id) values('$date','$bonus','$sid')";
  $runb = mysqli_query($conn, $sqlb);

  if ($runb) {
  ?>
    <script>
      window.location = "<?php echo $app_url . '/salary.php?ids=' . "$sid" ?>";
    </script>
  <?php
  } else {
    echo "<script>alert('Not Inserted'); </script>";
  }
}

//deduction
if (isset($_POST['adddeduction'])) {
  $sid = $_GET['ids'];
  $date = $_POST['ddate'];
  $deduction = $_POST['deduction'];

  $sqld = "insert into deduction (deduction,date,emp_id) values('$deduction','$date','$sid')";
  $rund = mysqli_query($conn, $sqld);

  if ($rund) {
  ?>
    <script>
      window.location = "<?php echo $app_url . '/salary.php?ids=' . $id ?>";
    </script>
<?php
  } else {
    echo "<script>alert('Not Inserted'); </script>";
  }
}

?>

<?php

if (isset($_POST['delete_salary'])) {

  $salary_id  = $_POST['salary_id'];

    $query = $connection->query("DELETE FROM salary where id =" . $salary_id);
    ?>
      <script>
        window.location = "<?php echo 'salary.php?ids=' . $id ?>";
    </script>
<?php
}

?>