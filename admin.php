<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
	header("Location: home.php");
	exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


$resCar = mysqli_query($conn, "SELECT * FROM car");

?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
</head>
<body >
           Hi <?php echo $userRow['userEmail' ]; ?>

           <a href="create.php">Create</a>
           
           <a  href="logout.php?logout">Sign Out</a><br><hr>

           <?php

			$rows = $resCar->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				echo $value["product_id"]. " ----- " .$value["make"]. " ". $value["model"]." ".$value["price"]. " ".$value["rental_place"]."<br>";
			}

 		?>
		
       		

 
</body>
</html>
<?php ob_end_flush(); ?>