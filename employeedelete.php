<?php
    include './database/db.php';

    
        $del_id=$_GET['ide'];
    
    ?>
    <script>alert('Are you sure to delete the employee records')</script>
    <?php
    
        $sqli="delete from employee where id='$del_id'";
        mysqli_query($connection,$sqli);
    
        ?>
        <script>
         window.location="Employee.php";
        </script>
        <?php
    
    
?>