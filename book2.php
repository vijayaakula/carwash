<!DOCTYPE html>
<html>
    <head>
<?php 
include('db.php');
session_start();
error_reporting(0);
$car=$_SESSION['car'];
$wash=$_SESSION['wash'];
$price=$_SESSION['pr'];
$priceid=$_SESSION['priceid'];
$personid=$_SESSION['personid'];
//timeslot
$t=$_SESSION['personid'];


//echo $priceid;
//echo $price;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $date=$_POST['date'];
    $time=$_POST['time'];
    //date timeslot checking
  $new="SELECT * FROM booking where bookingdate='$date'and personid='$t'";
  $newquery=mysqli_query($conn,$new);
  $assoc=mysqli_num_rows($newquery);
  if($assoc<3){

    //timeslot checking
   // $personmobile=$_SESSION['mobile'];
    $select="SELECT * FROM booking where personid='$t' and bookingdate='$date'";
    $query=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($query);
    $timerow=$row['bookingtime'];
  
    if($time==$timerow){
        $one="already requested for the same time slot";
    }
else{

    $registrationnum=$_POST['registrationnum'];
 $priceid=$_SESSION['priceid'];
 $personid=$_SESSION['personid'];
 //echo $priceid;
  $st="pending";
    $query="INSERT INTO booking(bookingdate,bookingtime,regnnumber,status,priceid,personid)values('$date','$time','$registrationnum','$st','$priceid','$personid')";
    $result=mysqli_query($conn, $query);
    if($result)
    {
       
       $succ= "booking request sent";
    }
    else
    {
        echo "failed";
    }
  }
}
else{
    $al="already applied for 3 slots in the requested date ";
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
    
  
  max-width:500px;
  border: 2px solid black;
  padding:30px;
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

    <br> 
   </div>
<form method="post"  class="container-fluid">
  <div class="form-group">
<div>
<h5>BOOK APPOINTMENT</h5>
<div id="p">


<b>Cartype</b><br>

<input type="text" name="car" value="<?php echo $car; ?> " class="form-control" style="max-width:100%;margin:auto;" disabled> 
<br>
<b>Wash type</b><br>
<input type="text" name="car" value="<?php echo $wash; ?>"  class="form-control" style="max-width:100%;margin:auto;" disabled > 
<br>
<b>Enter Date</b><br>
<input type="date" name="date"  class="form-control" style="max-width:100%;margin:auto;" required> <br>
<b>Time slot</b><br>
<select  select  class="form-control"    style="max-width:100%;margin:auto;" name="time" style="max-width:90%;" required>
        <option>10:00-11:00AM</option>
        <option>11:00-12:00AM</option>
        <option>12:00-01:00PM</option>
        <option>01:00-02:00PM</option>
        <option>02:00-03:00PM</option>
        <option>03:00-04:00PM</option>
        <option>04:00-05:00PM</option>
        <option>05:00-06:00PM</option>
</select>
<br>
<b> registration number</b><br>
<input type="text" name="registrationnum"  class="form-control" style="max-width:100%;margin:auto;" required><br>
<b>Price</b>
<input type="text" name="price" value="<?php echo $price; ?>" class="form-control" style="max-width:100%;margin:auto;" required><br>
<input type="submit" value="BOOK NOW" class="btn btn-info">
</div>
</div>
</form>
<?php 
echo $succ;
echo $one;
echo $al;
}
else{
  header("Location:userlogin.php");
}
?>
</body>
</html>