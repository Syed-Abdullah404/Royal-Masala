<?php
include('./database/db.php');


if($_POST['type']== ""){



    $sql = "select * from products where status = 'Active'";
$query = mysqli_query($connection,$sql) or die('Query dead');
 $str = "";
 while ($row = mysqli_fetch_assoc($query)) {
    $str.="<option value='{$row['id']}'>{$row['name']}</option>";
 }
}else if($_POST['type']== "data"){
    $sql = "select * from size where productId = {$_POST['id']} ";
    $query = mysqli_query($connection,$sql) or die('Query dead');
     $str = "";
     while ($row = mysqli_fetch_assoc($query)) {
        $str.="<option value='{$row['id']}'>{$row['size']}</option>";
     }

}

echo $str;
?>