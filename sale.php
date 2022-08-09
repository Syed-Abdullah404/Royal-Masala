
<?php
include('./database/db.php');





include 'header.php';

if(isset($_REQUEST['price_form'])){

    $sup = json_encode($_POST['supname']);
    $product =json_encode($_POST['product_name']);
    $size =json_encode($_POST['size']);
    $quantity =  json_encode($_POST['quantity_name']);
    $price = json_encode($_POST['price_name']);
    $total = json_encode($_POST['tprice_name']);
    $bill = json_encode($_POST['bill_id']);
    $status = json_encode($_POST['status']);

// echo "<script>console.log('$sup')</script>";  // 1st console   hassan    supplier_name  
 // echo "<script>console.log('$size')</script>";    
// echo "<script>console.log('$product')</script>";  //2st console   abc ,     abc product
// echo "<script>console.log('$quantity')</script>";  //3st console   21 first, 21  second   quantity name
// echo "<script>console.log('$price')</script>";   //4st console    2 first ,1  second     price 
// echo "<script>console.log('$total')</script>";    //5st console    42 first  ,21  second  total
// echo "<script>console.log('$bill')</script>";     //6st console    2            id
// echo "<script>console.log('$status')</script>";   //7st console    unpaid












    $bill_detail=$_POST['name'];
     $customer_detail=$_POST['uniqid'];
     $status_detail=$_POST['status_bill'];
     $sub_total = $_POST['sub'];
    //  $discount=$_POST['discount'];
    //  $finaltotal=$_POST['final'];
    //  $wht=$_POST['wht'];
    //  $paid=$_POST['paid_bill'];
    //  $rem=$_POST['rempay'];



    //  echo "<script>console.log('$bill_detail')</script>";    //1st console    hassan            name
    //  echo "<script>console.log('$customer_detail')</script>";   //2nd console    2            id
    //  echo "<script>console.log('$status_detail')</script>";  //3rd   console    unpaid
    //   echo "<script>console.log('$sub_total')</script>";     //84   total
    
    

    
  

  
     $connection->query("INSERT INTO `sale_detail`(`customer`, `bill_id`, `status`, `sub_total`) VALUES ('$bill_detail','$customer_detail','$status_detail','$sub_total')");
    
   
    if ($sup == ""|| $product == ""||$quantity == ""||$price =="" ) {
        echo json_encode([
            "status" => "all_required"
        ]);
        exit();
    }

   else{
    $sup = json_decode($sup);
    $product =json_decode($product);
    $size =json_decode($size);

    $quantity =  json_decode($quantity);
    $price = json_decode($price);
    $total = json_decode($sub_total);
    $bill = json_decode($bill);
    $status = json_decode($status);



    $end = count($product);
    
    

    
    
    
    
    
    
    for($i=0; $i<$end; $i++){

         $product_name = $product[$i]->value;
         $size_check = $size[$i]->value;

        // $sup_name =$sup[$i]->value;
         $quantity_name = $quantity[$i]->value;
         $price_name = $price[$i]->value;
      
           
        //  echo "<script>console.log('$bill_detail')</script>";     //84   total
        //  echo "<script>console.log('$customer_detail')</script>";     //84   total
        //  echo "<script>console.log('$status_detail')</script>";     //84   total
        //  echo "<script>console.log('$product_name')</script>";     //84   total
        //  echo "<script>console.log('$total')</script>";     //84   total
        //  echo "<script>console.log('$bill_detail')</script>";     //84   total
          echo "<script>console.log('size_check')</script>";     //84   total
        //  echo "<script>console.log()</script>";     //84   total

   
    // $sql=$connection->query("insert into sale_items set supplier ='$bill_detail',bill_id='$suppler_detail',status='$status_detail', item_name = '$product_name', quantity = '$quantity_name', price = '$price_name',  total = '$total',date=NOW()");
    //$sql=$connection->query("INSERT INTO `sale_items`(`customer`, `bill_id`, `status`, `item_name`, `quantity`, `price`, `date`, `total`) VALUES ('$bill_detail','$customer_detail','$status_detail','$product_name','$quantity_name','$price_name',NOW(),'$total')");
     $sql=$connection->query("INSERT INTO `sale_items`(`customer`, `bill_id`, `status`, `item_name`, `quantity`, `price`, `date`, `total`, `size`) VALUES ('$bill_detail','$customer_detail','$status_detail','$product_name','$quantity_name','$price_name',NOW(),'$total','$size_check')");


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