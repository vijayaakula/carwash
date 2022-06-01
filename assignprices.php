<!DOCTYPE html>
<html>
<head>
<?php
include('db.php');
session_start();
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id=$_POST['id'];
echo $id;
    $cartype=$_POST['cars'];
    $washtype=$_POST['wash'];
    
    $price=$_POST['price'];
$sel="SELECT * FROM cars where cartype='$cartype'";
$que=mysqli_query($conn,$sel);
$cararray=mysqli_fetch_assoc($que);
//echo $que['id'];
$sel2="SELECT * FROM wash where washtype='$washtype'";
$que2=mysqli_query($conn,$sel2);
$washarray=mysqli_fetch_assoc($que2);

$carid=$cararray['id'];
$washid=$washarray['id'];
//echo $carid;
//echo $washid;
$main="SELECT * FROM pricing where carid='$carid' and washid='$washid'";
$mainque=mysqli_query($conn,$main);
$arr=mysqli_fetch_assoc($mainque);
if($arr>0){
    $al= "already price assigned for the selected combination";
}
else{
if(!empty($price)){
$ins="INSERT into pricing(carid,washid,price)values('$carid','$washid','$price')";
$con=mysqli_query($conn,$ins);
$success="added successfully";
}
else{
    $rep="enter all details";
}
}

}
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



 <style> 
body{
    width:100%;

}

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
  margin:auto;
  text-align:center;
  width:40%;
  
}
#p{
    
    background-color:#f3e0eef6;
  max-width:500px;
  border: 2px solid green;
  padding: 30px;
  margin: 20px;
  text-align:center;
  margin:auto;
  

}

</style>



</head>
<body>
<?php
if(!empty($_SESSION['admin']))
{
    ?>
<div>
        
        <div class="row adefault header">
              <div class="name">
              <a href="viewprices.php" type="submit" name="submit" >View Price List</a>
              <a href="assignprices.php" type="submit" name="submit" >Assign Prices</a>
             <a href="viewbookings.php" type="submit" name="submit" >View bookings</a>
            
             <a href="logout.php" type="submit" name="submit" >Logout</a>
             </div>
               </div>

    <br> 
   </div>
   
   <form method="post"  class="container-fluid">
  <div class="form-group">
<div>
<h4>ADD PRICE</h4><br>
<div id="p">
<br><br>

<b>Car type</b><br>

<select class="form-control" name="cars"  style="max-width:100%;margin:auto;" id="myForm" required>
 <?php $query=mysqli_query($conn,"SELECT * FROM cars");
    while($que=mysqli_fetch_assoc($query)){ ?>
    <option name="<?php echo $que['id']; ?>">
<?php 
echo $que['cartype']; ?>
 </option>

  <?php }  ?>
</select>  
<br><br>


<b>Wash type</b><br>
<select  select  class="form-control" style="max-width:100%;margin:auto;" name="wash" required>
     <?php $query2=mysqli_query($conn,"SELECT * FROM wash");
    while($que2=mysqli_fetch_assoc($query2)){ ?>
    <option>
<?php  echo $que2['washtype']; ?>
    </option>
 
  <?php }  ?>
</select>

<br><br>
<b>Enter Price</b><br>
<input type="text" name="price"  class="form-control" style="max-width:100%;margin:auto;" required><br><br>
<input type="submit" value="submit" class="btn btn-info">
</div>
</div>
</div>
</form>

</body>
<div style="text-align:center;">
<?php
echo $success;
echo $rep;
echo $al;
 } 
else{
  header("Location:adminlogin.php");
}

?>
</div>
</html>