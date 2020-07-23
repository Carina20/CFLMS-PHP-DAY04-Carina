<?php 
ob_start();
session_start();

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}


require_once '../dbconnect.php';

if ($_POST) {
   $make = $_POST['make'];
   $model = $_POST['model'];
   $price = $_POST[ 'price'];
   $availability = $_POST[ 'availability'];
   $rental_place = $_POST[ 'rental_place'];

   $sql = "INSERT INTO car (make, model, price, availability, rental_place) VALUES ('$make', '$model', '$price', '$availability', '$rental_place')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../admin.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>