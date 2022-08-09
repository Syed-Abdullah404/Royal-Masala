<?php

include('header.php');
?>

<div class="body-section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mm">
                <!-- <h2 class="ml-3">Sale</h2> -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Purchasing</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="cart" method="POST">




                                    <table name="cart table  responsive text-center">
                                        <div class="row text-center mx-auto">
                                            <div class="col-xl-3 mt-2">
                                                <div class="form-group " style="display: inline;">
                                                    <?php

                                                    $query = mysqli_query($connection, "select * from sale_items");
                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                        $ids = $row['bill_id'];
                                                        $ids++;
                                                    }

                                                    ?>
                                                    <input type="text" class="form-control bill_id" name="unique_id" id="unique" placeholder="Bill No" value="<?php
                                                                                                                                                                if ($ids) {
                                                                                                                                                                    echo $ids;
                                                                                                                                                                } else {
                                                                                                                                                                    echo 1;
                                                                                                                                                                }
                                                                                                                                                                ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 mt-2">
                                                <div class="form-group mx-2">
                                                    <input class="form-control supname" name="supname" id="name_suppler" required="" value="">

                                                    </select>
                                                </div>
                                            </div>



                                        </div><br>
                                        <tr style="margin-bottom: 20px;">
                                            <td colspan="99" class="mb-3"><button class="row-add btn btn-primary px-3 float-end">Add </button></td>
                                        </tr>
                                        <tr class="mt-5">
                                            <td>&nbsp;</td>
                                            <th><label for="">Product_Name</label></th>
                                            <th><label for="">Size</label></th>
                                            <th><label for="">Quantity</label></th>
                                            <th>Price</th>
                                            <th></th>
                                            <th style=" margin-left:20px"><label for=""> Total_Price</label></th>
                                        </tr>
                                        <tr class="line_items text-center " style="margin-top:5px;">
                                            <td><button class="row-remove btn btn-danger " style=" margin-right:20px">Remove</button></td>
                                            <td>
                                                <select class="form-select product_name" id="productss" style="margin-top: 11px;" required="" name="product">
                                                    <option value="">Select Product</option>
                                                   
                                                </select>
                                            </td>
                                            <td>

                                                <select name="" id="sizes" class="form-select size" style="margin-top: 11px; width: 100px;" name="size">
                                                    <option disabled>Select Size</option>

                                                    
                                                </select>
                                            </td>



                                            <td><input type="number" step="any" class="form-control quantity_name" style=" margin-top: 11px;" name="qty" value=""></td>

                                            <td><input type="number" step="any" class="form-control price_name" style="    margin-top: 11px;" name="price" value=""></td>
                                            <td>&nbsp;</td>
                                            <td><input type="text" class="form-control tprice_name" style="    margin-top: 11px;" name="item_total" value="" jAutoCalc="{qty} * {price}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>

                                            <th><label for="">Total</label></th>
                                            <td>&nbsp;</td>
                                            <td><input type="text" class="form-control" id="sub" name="sub_total" value="" jAutoCalc="SUM({item_total})"></td>
                                        </tr>


                                        <!-- <tr>
                      <td colspan="3">&nbsp;</td>
                      <th><label for="">GST Total</label></th>
                      <td>&nbsp;</td>
                      <td> <input type="text" name="ftotal" id="final" class="form-control" value="" jAutoCalc="({gtotal}+({gtotal} * {gst})/100)" readonly></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                      <th><label for="">Grand Total</label></th>
                      <td>&nbsp;</td>
                      <td> <input type="text" name="grandtotal" id="grandtotal" class="form-control" value="" jAutoCalc="({ftotal}+({ftotal} * {wht})/100)" readonly></td>
                    </tr> -->

                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                            <!-- <th><label for="">Remaining</label></th> -->
                                            <td>&nbsp;</td>
                                            <td> <input type="text" name="rempay" id="rempay" class="form-control" value="" jAutoCalc="({sub_total} - {paid_unpaid})" readonly style="display: none;"></td>
                                        </tr>


                                        <!-- <tr>
                      <td colspan="3">&nbsp;</td>
                      <th><label for="">Total</label></th>
                      <td>&nbsp;</td>
                      <td><input type="text" class="form-control" id="sub" name="sub_total" value="" jAutoCalc="SUM({item_total})"></td>
                    </tr> -->

                                        <tr>
                                            <td>
                                                <br>
                                                <label class="fw-bold">Payment Status</label>
                                                <select class="form-control status" name="status" id="status_id" required="" style="width: 170px;">
                                                    <option value="paid">Paid</option>
                                                    <option value="unpaid" selected>UnPaid</option>

                                                </select>
                                            </td>

                                            <td>
                                                <br>
                                                <!--                        
                        <label class="fw-bold">Enter Amount if paid</label> -->
                                                <input type="number" step="any" class="form-control mx-2" name="paid_unpaid" id="paid_id" style="display: none;" placeholder="Enter Amount if paid" value="0">

                                            </td>

                                        </tr>


                                        <tr>
                                            <td colspan="99"><button type="submit" id="submit_product" style=" margin-top: 16px;" class="btn btn-success p-2">Submit</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>














<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Sale</h4>
                <button type="button" class="btn btn-success my-4" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="fas fa-plus"></i> Add Sale
                </button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Product details</th>

                                <th scope="col">Size</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>


                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $squery = "select * from sale_detail ORDER BY bill_id DESC";
                            $run = mysqli_query($connection, $squery);
                            while ($row = mysqli_fetch_assoc($run)) {
                                $bill = $row['bill_id'];
                                $customer = $row['customer'];
                                $status = $row['status'];
                                $sub_total = $row['final_total'];
                                // $remaining = $row['remaining'];
                                // $paid = $row['paid'];
                            ?>

                                <tr>
                                    <td><?php echo $bill; ?></td>
                                    <td style="width:120px;"><?php echo $customer; ?></td>

                                    <td>
                                        <?php
                                        $query = mysqli_query($connection, "select * from sale_items where bill_id='$bill'");
                                        while ($rows = mysqli_fetch_assoc($query)) {
                                            $product_name = $rows['item_name'];
                                            $quantity = $rows['quantity'];
                                            $product_price = $rows['price'];
                                            $bill_no = $rows['bill_id'];
                                            $total = $rows['total'];
                                            $size = $rows['size'];
                                        ?>
                                            <label class="fw-normal text-danger">Product:</label> <?php echo $product_name; ?> <label class="fw-normal text-primary">, Quantity: </label> <?php echo $quantity; ?> <label class="fw-normal text-purple">, Price: </label> <?php echo $product_price; ?>
                                            <br>

                                        <?php

                                        } ?>
                                    </td>
                                    <!-- <td><?php echo $paid; ?></td>
              <td><?php echo $remaining; ?></td> -->
                                    <!-- <td><?php echo $row['grand_total']; ?></td>
              <td><?php echo $row['final_total']; ?></td> -->
                                    <td><?php echo $size; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td style="width:90px;">
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

<!-- //delete Modal/.. -->
<div class="modal fade" id="deleteexampleModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="deleteSale.php" method="POST">
                    <input type="hidden" name="deleteid" id="id">
                    <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
                    <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
                <button type="submit" name="delete" class="btn btn-danger">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>




<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script>
    



    //  function getAmount(){
    //   var value = $('#sub').val();
    //   var percent = $('#discount').val();
    //   var discount=value - ((value * percent)/100);
    //   $('#grand').val(discount);
    // }

    // function getTotal(){
    //   var value = $('#grand').val();
    //   var vg=parseFloat(value);
    //   var percent = $('#gst').val();
    //   var vp=parseFloat(percent);
    //   var discountg=vg + ((vg * vp)/100);
    //   $('#final').val(discountg);
    // }
</script>
<script>
    $(document).ready(function() {

    
    
        $('.deletebtn').on('click', function() {
            $('#deleteModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#deleteid').val(data[0]);

        });
    });
</script>

<script type="text/javascript">

$(document).ready(function() {
    function loadData(type , category_id){
        $.ajax({
            url :"load.php",
            type:"post",
            data : {type : type, id :category_id},
            success : function(data){

                if(type == "data"){

                    $("#sizes").html(data);
                }else{

                    $("#productss").append(data);
                }

            }
        });
    }
    loadData();
    $("#productss").on("change", function () {
    var product = $("#productss").val();
    loadData('data', product) ;   
    });
});



    $(function() {

        function autoCalcSetup() {
            $('form#cart').jAutoCalc('destroy');
            $('form#cart tr.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('form#cart').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup();
        $('button.row-remove').on("click", function(e) {
            e.preventDefault();

            var form = $(this).parents('form')
            $(this).parents('tr').remove();
            autoCalcSetup();

        });

        $('button.row-add').on("click", function(e) {
            e.preventDefault();

            var $table = $(this).parents('table');
            var $top = $table.find('tr.line_items').first();
            var $new = $top.clone(true);

            $new.jAutoCalc('destroy');
            $new.insertBefore($top);
            $new.find('input[type=text]').val('');
            autoCalcSetup();

        });








        // del button
        $('.delbtn').on('click', function() {
            $('#deleteexampleModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();

            // console.log(data);
            $('#id').val(data[0]);


        });


    });



    $("#cart").on("submit", function(e) {
        e.preventDefault();
        let name = $('#name_suppler').val();
        console.log(name);
        $('.assign').val(name);

        $('#submit_product').text('Submitting...');
        $('#myModal').modal('toggle');
        //window.location.href = "gatePass_in.php";



        let uniqid = $('#unique').val();
        console.log(uniqid);
        $('.assign_id').val(uniqid);

        let status_bill = $("#status_id").val();
        console.log(status_bill);
        $('.assign_status').val(status_bill);

        // let discount = $("#grand").val();
        // console.log(discount);
        // $('.assign_grand').val(discount);

        // let final = $("#final").val();
        // console.log(final);
        // $('.assign_final').val(final);

        // let wht = $("#grandtotal").val();
        // console.log(wht);
        // $('.assign_wht').val(wht);

        let sub = $('#sub').val();
        console.log(sub);

        let paid_bill = $('#paid_id').val();
        console.log(paid_bill);

        let rempay = $('#rempay').val();
        console.log(rempay);


        let n = sub - paid_bill;
        console.log(n);

        var supname = [];
        var product_name = [];
        var size = [];
        var quantity_name = [];
        var price_name = [];
        var tprice_name = [];
        var bill_id = [];
        var status = [];
        $('.supname').each(function() {
            supname.push({
                value: this.value
            });
        });
        $('.product_name').each(function() {

            product_name.push({
                value: this.value
            })
        });
        $('.size').each(function() {

            size.push({
                value: this.value
            })
        });
        $('.quantity_name').each(function() {

            quantity_name.push({
                value: this.value
            })
        });
        $('.price_name').each(function() {

            price_name.push({
                value: this.value
            })
        });
        $('.tprice_name').each(function() {

            tprice_name.push({
                value: this.value
            })
        });
        $('.bill_id').each(function() {

            bill_id.push({
                value: this.value
            })
        });
        $('.status').each(function() {

            status.push({
                value: this.value
            })
        });
        $.ajax({
            url: "sale.php?price_form",
            type: "POST",
            data: {
                supname: supname,
                product_name: product_name,
                size: size,
                quantity_name: quantity_name,
                price_name: price_name,
                tprice_name: tprice_name,
                bill_id: bill_id,
                status: status,
                name: name,
                uniqid: uniqid,
                status_bill: status_bill,
                // discount: discount,
                // final: final,
                // wht: wht,
                sub: sub,
                paid_bill: paid_bill,
                rempay: rempay

            },
            success: function(data) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
                console.log('yes');
                console.log(data);
                let response = JSON.parse(data);
                $('#cart').trigger("reset");
                if (response.status == "success") {
                    swal({
                            title: "Success!",
                            text: "Good job.",
                            type: "success",
                            timer: 50,
                            showConfirmButton: true,
                        },

                        function() {
                            window.location.href = "gatePass_out.php";
                        });

                }

            },

        });
    });
</script>