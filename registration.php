<!DOCTYPE html>
<html>
  <head>
  <?php 
  session_start();
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $name = $_POST["name"];

  $password = $_POST["password"];

  $mobile = $_POST["mobile"];
  $st=1;
  if( !empty($name)){
      $query = "INSERT into  login(name,password,mobile,status) 
      values( '$name','$password','$mobile','$st')";
      $con=mysqli_query($conn,$query);
      header("Location:userlogin.php");
  }

 }

 if(isset($_POST['Login']))
 {
 header("Location:userlogin.php");
}

?>
  <title>bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" type="text/css"></script>
    <link rel="stylesheet" type="text/css" href="global.css">
    <script language="javascript" type="text/javascript">
window.history.forward();

</script>


    <style type="text/css">

h3{
      color:white;
    
    }
   
 
    h3,b{
      color:black;
    
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


        h4{
   color:black;
   
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

<div class="container logincontainer "  >
 <div class="row">
 <div class="col-md-4"></div>
<div class="col-md-8">
<div style="width:35%;" >
<br>
<br>
<br>

<div><h4 style="padding-top:50px;">REGISTRATION FORM</h4> <br></div>
<form class="form-container" action="" method="post">

<div>
 <b> Name</b><br> <input type="text" name="name" id="name" style="width:100%;">
</div>

 

 <div>
 <b>Password</b><br><input type="password" name="password" id="password" style="width:100%;" ><br></div>

  <div><b>Mobile No.</b> <br><input type="text" name="mobile" id="mobile" style="width:100%;"><br></div><br>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="login" name="Login" class="btn btn-primary">Login</button>
</div>
</form>
</div>

<div class="col-md-4"></div>

</div>
</div>




</body>
  </html>