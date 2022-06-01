

<!DOCTYPE html>
<html>
<head>
<?php
include('db.php');
session_start();
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$price=$_POST['price'];
    
$string =$_POST['cars'];
$int1 = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);  

$string =$_POST['wash'];
$int2 = (int) filter_var($string, FILTER_SANITIZE_NUMBER_INT);  

$main="SELECT * FROM pricing where carid='$int1' and washid='$int2'";
$mainque=mysqli_query($conn,$main);
$arr=mysqli_fetch_assoc($mainque);
if($arr>0){
    $al= "already price assigned for the selected combination";
}else
{
$ins="INSERT INTO pricing(carid,washid,price)values('$int1','$int2','$price')";
$que=mysqli_query($conn,$ins);
$suc="inserted successfully";
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
echo $que['id'].".".$que['cartype']; ?>
 </option>

  <?php }  ?>
</select>  
<br><br>


<b>Wash type</b><br>
<select  select  class="form-control" style="max-width:100%;margin:auto;" name="wash" required>
     <?php $query2=mysqli_query($conn,"SELECT * FROM wash");
    while($que2=mysqli_fetch_assoc($query2)){ ?>
    <option>
<?php  echo $que2['id'].".".$que2['washtype']; ?>
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
echo $suc;
echo $rep;
echo $al;


?>
</div>
</html>