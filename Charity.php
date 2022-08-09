<?php

include 'header.php';

?>
<style>
  .mm {
    margin-top: 10px;
  }

  .mn {
    margin-top: -140px;
  }
</style>

<div class="body-section">
  <div class="container ">
    <div class="card mm">
      <div class="card-header border-0">
        <h3 class="card-title">Sale Report</h3>
        <!-- Button trigger modal -->

        <div class="container mt-1">

          <form action="" method="POST" class="d-print-none">
            <span> From </span>
            <div class="form-group ">
              <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <span> To </span>
            <div class="form-group ">
              <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary mt-2" name="searchsubmit" value="Search">
            </div>

          </form>
          <?php
          if (isset($_REQUEST['searchsubmit'])) {
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];
            $sql = mysqli_query($connection, "SELECT quantity FROM sale_items WHERE date BETWEEN '$startdate' AND '$enddate'");

            // if($sql->num_rows > 0){
            //    //$query = $connection->query("SELECT SUM(quantity) AS 'Total working hours FROM sale_items");
            //   $_SESSION['saleStart']=$startdate;
            //   $_SESSION['saleEnd']=$enddate;
          ?>
            <table>

            </table>
            <p class=" bg-dark text-white p-2 mt-4">Details</p>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Per Pack Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Charity</th>
                  <th scope="col">Charity</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $price  = 5;
                $total = 0;
                $charity = 0;
                while ($row = mysqli_fetch_assoc($sql)) {
                  $amount = $row['quantity'];
                  $total = $total + $amount;
                  $charity = $total * $price;
                }
                ?>
                <tr>

                  <td><?php echo $price ?></td>
                  <td><?php echo $total ?></td>
                  <td><?php echo $charity ?></td>
                  <td> <button type="button" class="btn btn-lg  btn-success " data-bs-toggle="modal" data-bs-target="#editModal">
                      Pay charity
                    </button></td>
                </tr>

              </tbody>
            </table>
          <?php
            // } else {
            //   echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
            // }
          }
          ?>


          <hr>
          <div class="card-body table-responsive">
            <table id="table" class="table table-bordered pt-2">

            </table>
          </div>
        </div>




      </div>
      <!-- flex-item -->
    </div>
    <!-- /flex-container -->
  </div>
</div>
<!-- flex-item -->
</div>
<!-- /flex-container -->
</div>
</div>

</div>

</div>




</div>







<?php
include 'footer.php';

?>