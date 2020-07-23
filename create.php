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
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>car model</th>
               <td><input  type="text" name="model"  placeholder="car model" /></td >
           </tr>    
           <tr>
               <th>type</th>
               <td><input  type="text" name= "type" placeholder="type" /></td>
           </tr>
           <tr>
               <th>color</ th>
               <td><input type="text"  name="color" placeholder ="color" /></td>
           </tr>
           <tr>
               <td><button type ="submit">Insert car</button></td>
               <td><a href= "admin.php"><button  type="button">Back</button></a></td>
           </tr >
       </table>
   </form>

</fieldset >

</body>
</html>