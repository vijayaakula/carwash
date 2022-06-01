<!DOCTYPE html>
<html>
  <head>
  <?php 
include('db.php');
session_start();
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 
  $mobile= $_POST["mobile"];

  $password= $_POST["password"];
$st=1;
    $query="SELECT * from login where mobile= '$mobile' and password='$password' and status='$st'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_fetch_assoc($result);
$_SESSION['password']=$count['password'];
$_SESSION['mobile']=$count['mobile'];
$_SESSION['personid']=$count['id'];
echo $_SESSION['personid'];
    if($count>0){
   
    header("Location:bookappointment.php");
    
    }
    else{
    $msg="invalid user details";
    }
  
 }

?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" type="text/css"></script>
    <link rel="stylesheet" type="text/css" href="global.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  

   <style type="text/css">

    
    h3{
      color:black;
    margin:auto; 
    }

#contact_showcase{
  margin-top: 70px;
}

body{
    background-color: #f8f5f7f8;
  }
 h3,b{
   color:black;
    margin:auto; 
    }
    a{
    padding-right:50px;
        
     }
.header{
    width:99vw;
    background-color:#e94fc2f6;
   
}

.name{
 margin:0;
 padding:20px;

}
.name a{
    color:white;
    margin:0;
    text-decoration:none;
}

</style>

</head>
<body>

 <div class="row2 adefault header">
              <div class="name">  
              <a href="adminlogin.php" type="submit" name="submit" >Admin portal</a>
             <a href="registration.php" type="submit" name="submit" >User portal</a>
          
            
             </div>
               </div> 

<br>
<div class="container logincontainer "  >
 <div class="row">
  

<div class="col-lg-4"></div>
<div class="col-lg-8">
<div style="width:35%;" text-align="center;">
<br>
<br>
<br>

<b><h2>Login Here!</h2></b>
<br>
<form class="form-container" action="" method="post">


 <div>
<b>MOBILE</b><br><input type="text" name="mobile" id="mobile" required>
 <div><br>
 <b>PASSWORD</b><br><input type="password" name="password" id="password" required><br></div>
  <br>
  <button type="submit" class="btn btn-primary" style="width:100px;">Submit</button>
 
</div>
</form>
</div>
<div class="col-lg-4"></div>

</div>
</div>
<br>
<?php echo $msg;

?>

</body>
</html>