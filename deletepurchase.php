<?php
    include './database/db.php';
    if(isset($_POST['delete']))
    {
        $del_id=$_POST['deleteid'];
    
      
        $sqli="delete from purchase_detail where bill_id='$del_id'";
        mysqli_query($connection,$sqli);
        $sql="delete from items where bill_id='$del_id'";
        mysqli_query($connection,$sql);
        ?>
        <script>
            window.location="gatePass_in.php";
        </script>
        <?php
    }
    
?>