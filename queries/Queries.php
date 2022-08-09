<?php
include('../database/db.php');
?>

<!-- Signin -->

<?php
if (isset($_POST['signin'])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $pass = sha1($password);
  if ($email == "" || $pass == "") {

    echo "<script>window.location='../signin.php?msg=Empty_fields'</script>";
  }
  if ($email != NULL) {
    $result = $connection->query("SELECT * FROM admin WHERE email='$email' and `password`='$pass'");
    if ($result->num_rows > 0) {
      $data = $result->fetch_assoc();
      // creating Sessions 
      $_SESSION['signin'] = true;
      $_SESSION["admin_id"] = $data["admin_id"];
      $_SESSION["email"] = $data["email"];
      $_SESSION["password"] = $data["password"];

      echo "<script>window.location='../index.php'</script>";
    } else {
      echo "<script>window.location='../signin.php?msg=No-User-Exist'</script>";
    }
  }
}
?>


<!-------------------------------------------------------------------------------------------------------------------------------------------- -->




<!-------------------------------------------------------------------------------------------------------------------------------------------- -->



<!------------------------------------------------------------------------------------------------------------------------------------------------->


<!-- Add Product -->

