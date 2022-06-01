<!DOCTYPE html>
<html>
  <head>
  <?php 
include('db.php');
session_start();
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
 
  $name= $_POST["name"];
  //echo $username;
  $password= $_POST["password"];
  $st=0;
  if(!empty($_POST['name']) && !empty($_POST['password'])){
    $query="SELECT * from login where name= '$name' and password='$password' and status='$st'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_fetch_assoc($result);
   
    if($count>0){
   
    $_SESSION['admin']=$count['name'];

    header("Location:assignprices.php");
    
    }
     else{
       $msg2= "invalid credidentials";
     }
    }

 }


?>
  <title>bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" type="text/css"></script>
    <link rel="stylesheet" type="text/css" href="global.css">
    
    
    <script language="javascript" type="text/javascript">
   window.history.forward();
    </script>
    <style >
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
    width:100vw;
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

<div class="row adefault header">
              <div class="name">  
              <a href="adminlogin.php" type="submit" name="submit" >Admin portal</a>
             <a href="registration.php" type="submit" name="submit" >User portal</a>
          
             </div>
               </div>
               <br>
               <br>
<div class="container logincontainer "  >
 <div class="row">
  

<div class="col-lg-4"></div>
<div class="col-lg-8">
<div style="width:35%;" text-align="center;">
<div><h3 style="padding-top:100px;" style="text-align:center;">LOGIN HERE<?php echo " ","!" ?></h3> <br></div>
<form class="form-container" action="" method="post">


 <div>
<b>username</b><br><input type="text" name="name" id="name" required>
 <div><br>
 <b>Password</b><br><input type="password" name="password" id="password" required ><br></div>
  <br>
  <button type="submit" class="btn btn-primary" style="width:100px;">Submit</button>
 
</div>
</form>
</div>
<div class="col-lg-4"></div>

</div>
</div>
<br>
<div style="text-align:center;">
<?php
 echo $msg2;
?>
</div>
</body>
  </html>