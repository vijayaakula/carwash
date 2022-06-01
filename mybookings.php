<!DOCTYPE html>
<html>
<head>
<?php
include('db.php');
session_start();
error_reporting(0);

?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness"></link>


 <style> 
 

a{
    padding-right:50px;
   
}
.header{
    width:100vw;
    background-color:#e94fc2f6;
    margin:0;
}

.name{
 
    padding:20px;

}
.name a{
    color:white;
    text-decoration:none;
}

form{
    float:right;
}
</style>



</head>
<body>
<?php
if(!empty($_SESSION['mobile']))
{
    ?>

        
<div>
        
<div class="row adefault header">
              <div class="name">  
              <a href="mybookings.php" type="submit" name="submit" >My Bookings</a>
              <a href="bookappointment.php" type="submit" name="submit" >Book appointment</a>
            
            
             <a href="logout.php" type="submit" name="submit" >logout</a>
             </div>
               </div>

    <br> 
   </div>


<b><h3 style="text-align:center; width:20%; margin:auto;"> MYBOOKINGS </h3></b>

<br>


<div class="container">          
     <div class="row">          
     <div class="col-12">          
<table class="table table-bordered" >
<tr>
<td><b>ID</b></td>

<td><b>Date</b></td>
<td><b>Time slot</b></td>
<td><b>STATUS</b></td>
</tr>
<?php
$st=$_SESSION['personid'];
$sel="SELECT * FROM booking where personid='$st'";
$query=mysqli_query($conn,$sel);
while($rows=mysqli_fetch_assoc($query)){
?>
<tr>

<td ><?php echo $rows['id']; ?></td>
<td ><?php echo $rows['bookingdate']; ?></td>
<td ><?php echo $rows['bookingtime']; ?></td>
<td ><?php echo $rows['status']; ?></td>


</tr>
<?php
}
?>
</table>
</div>
</div>

</div>
<?php }
else{
header("Location:userlogin.php");
} ?>
</body>

</html>