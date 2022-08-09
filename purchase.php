
<?php
include('./database/db.php');





include 'header.php';

if(isset($_REQUEST['price_form'])){

    $sup = json_encode($_POST['supname']);
    $product =json_encode($_POST['product_name']);
    $quantity =  json_encode($_POST['quantity_name']);
    $price = json_encode($_POST['price_name']);
    $total = json_encode($_POST['tprice_name']);
    $bill = json_encode($_POST['bill_id']);
    $status = json_encode($_POST['status']);

// echo "<script>console.log('$sup')</script>";  // 1st console   hassan    supplier_name  
// echo "<script>console.log('$product')</script>";  //2st console   abc ,     abc product
// echo "<script>console.log('$quantity')</script>";  //3st console   21 first, 21  second   quantity name
// echo "<script>console.log('$price')</script>";   //4st console    2 first ,1  second     price 
// echo "<script>console.log('$total')</script>";    //5st console    42 first  ,21  second  total
// echo "<script>console.log('$bill')</script>";     //6st console    2            id
// echo "<script>console.log('$status')</script>";   //7st console    unpaid












    $bill_detail=$_POST['name'];
     $suppler_detail=$_POST['uniqid'];
     $status_detail=$_POST['status_bill'];
     $sub_total = $_POST['sub'];
    //  $discount=$_POST['discount'];
    //  $finaltotal=$_POST['final'];
    //  $wht=$_POST['wht'];
     $paid=$_POST['paid_bill'];
     $rem=$_POST['rempay'];



    //  echo "<script>console.log('$bill_detail')</script>";    //1st console    hassan            name
    //  echo "<script>console.log('$suppler_detail')</script>";   //2nd console    2            id
    //  echo "<script>console.log('$status_detail')</script>";  //3rd   console    unpaid
    //   echo "<script>console.log('$sub_total')</script>";     //84   total

    //  echo "<script>console.log('$paid')</script>"; // 32 if paid
    //  echo "<script>console.log('$rem')</script>";  // reminder


    $connection->query("insert into purchase_detail set supplier='$bill_detail',bill_id='$suppler_detail',status='$status_detail',sub_total='$sub_total',paid='$paid',remaining='$rem'");
    if ($sup == ""|| $product == ""||$quantity == ""||$price =="" ) {
        echo json_encode([
            "status" => "all_required"
        ]);
        exit();
    }

   else{
    $sup = json_decode($sup);
    $product =json_decode($product);
    $quantity =  json_decode($quantity);
    $price = json_decode($price);
    $total = json_decode($sub_total);
    $bill = json_decode($bill);
    $status = json_decode($status);



    $end = count($product);
    
    

    
    
    
    
    
    
    for($i=0; $i<$end; $i++){

         $product_name = $product[$i]->value;

        // $sup_name =$sup[$i]->value;
         $quantity_name = $quantity[$i]->value;
         $price_name = $price[$i]->value;
      
           
   
    $sql=$connection->query("insert into items set supplier ='$bill_detail',bill_id='$suppler_detail',status='$status_detail', item_name = '$product_name', quantity = '$quantity_name', price = '$price_name',  total = '$total',date=NOW()");


  $ii = ($i+1);
    if($ii == $end){
    echo json_encode([
          "status" => "success",
        ]);
      }


}
        
   }
}



?>
?>