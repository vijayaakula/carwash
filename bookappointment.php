<!DOCTYPE html>
<html>
<head>
<?php 
include('db.php');
session_start();
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$cartype=$_POST['cars'];
$washtype=$_POST['wash'];
$sel="SELECT * FROM cars where cartype='$cartype'";
$que=mysqli_query($conn,$sel);
$cararray=mysqli_fetch_assoc($que);
$_SESSION['car']=$cartype;
$_SESSION['wash']=$washtype;
$sel2="SELECT * FROM wash where washtype='$washtype'";
$que2=mysqli_query($conn,$sel2);
$washarray=mysqli_fetch_assoc($que2);

$carid=$cararray['id'];
$washid=$washarray['id'];
$select="SELECT * FROM pricing where carid='$carid' and washid='$washid'";
$query=mysqli_query($conn,$select);
$ar=mysqli_fetch_assoc($query);
$_SESSION['pr']=$ar['price'];
$_SESSION['priceid']=$ar['id'];
if($ar>0){
header("Location:book2.php");
}
else{
    $no="sorry! no results found";
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
  padding: 50px;
  margin: 20px;
  text-align:center;
  margin:auto;
  

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

    <br> <br>
   </div>
   <div >
<form method="post"  class="container-fluid" >
  <div class="form-group">
  <h5>BOOK AN APPOINTMENT</h5><br>
  <div id="p"><br>




<b>Cartype</b><br>

<select class="form-control" name="cars"  style="max-width:100%;margin:auto;" id="myForm">
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
<select  select  class="form-control"    style="max-width:100%;margin:auto;" name="wash" style="max-width:90%;">
<?php $query2=mysqli_query($conn,"SELECT * FROM wash");
while($que2=mysqli_fetch_assoc($query2)){ ?>
    <option >
    
<?php  echo $que2['washtype']; ?>
 </option>
 
  <?php }  ?>
</select>
<br>

<input type="submit" value="submit" class="btn btn-info">
    <div>
</form>
</div>
<?php 
echo $no;
}
else{
  header("Location:userlogin.php");
}
?>
</body>
</html>