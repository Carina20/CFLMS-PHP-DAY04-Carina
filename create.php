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
?>
<!DOCTYPE html>
<html>
<head>
   <title>PHP CRUD  |  Add User</title>

   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </style>

</head>
<body>

<fieldset >
   <legend>Add car</legend>

   <form action="actions/a_create.php" method= "post">
       <b><table cellspacing= "3" cellpadding="3"> 
           <tr>
               <td>car make</td>
               <td><input  type="text" name="make"  placeholder="car make" /></td>
           </tr>    
           <tr>
               <td>model</td>
               <td><input  type="text" name= "model" placeholder="model" /></td>
           </tr>
           <tr>
               <td>price</td>
               <td><input type="text"  name="price" placeholder ="price" /></td>
           </tr>
           <tr>
               <td>availability</td>
               <td><input  type="text" name= "availability" placeholder="availability" /></td>
           </tr>
           <tr>
               <td>rental place</td>
               <td><input  type="text" name= "rental_place" placeholder="rental place" /></td>
           </tr>
           <tr>
               <td><br><button type ="submit">Insert car</button></td>
               <td><br><a href= "admin.php"><button  type="button">Back</button></a></td>
           </tr >
       </table></b>
   </form>

</fieldset >

</body>
</html>