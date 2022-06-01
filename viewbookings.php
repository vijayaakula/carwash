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
if(!empty($_SESSION['admin']))
{
    ?>

        
<div>
        
        <div class="row adefault header">
              <div class="name">
              <a href="viewprices.php" type="submit" name="submit" >view price list</a>
              <a href="assignprices.php" type="submit" name="submit" >Assign Prices</a>
             <a href="viewbookings.php" type="submit" name="submit" >View bookings</a>
            
             <a href="logout.php" type="submit" name="submit" >Logout</a>
             </div>
               </div>

    <br> 
   </div>


<b><h3 style="text-align:center; width:20%; margin:auto;">BOOKINGS LIST</h3></b>

<br>


<div class="container">          
     <div class="row">          
     <div class="col-12">          
<table class="table table-bordered" >
<tr>
<td><b>ID</b></td>
<td><b>REGISTRATION No.</b></td>
<td><b>DATE ('Y-M-D')</b></td>
<td><b>TIME SLOT</b></td>
<td><b>STATUS</b></td>
<td><b>CONFIRM SLOT</b></td>
<td><b>CANCEL SLOT</b></td>
</tr>
<?php
$sel="SELECT * from booking";
$query=mysqli_query($conn,$sel);
while($rows=mysqli_fetch_assoc($query)){
?>
<tr  id="<?php echo 'replace_'.$rows["id"]; ?>" >
<td><?php echo $rows['id']; ?></td>

<td><?php echo $rows['regnnumber']; ?></td>
<td><?php echo $rows['bookingdate']; ?></td>
<td><?php echo $rows['bookingtime']; ?></td>
<td ><?php echo $rows['status']; ?></td>
<td><button type="button" id="<?php echo $rows['id']; ?>" class="btn_confirm btn-info">Confirm</button></td>
<td><button type="button" id="<?php echo $rows['id']; ?>" class="btn_cancel btn-info ">Cancel</button></td>


</tr>
<?php
}
}
else{
    header("Location:adminlogin.php");
}
?>
</table>
</div>
</div>

</div>

<script>
     $(document).ready(function(){
    $(".btn_confirm").click(function(){
        var id=$(this).attr('id');
         console.log(id);
      $.ajax({
        
       url:"ajax_calls.php",
       type:'post',
       dataType:'json',
       data:{'action':'confirm_status', 
       "id":id  },
  
     
     success:function(resp)
     {
      
         var html = '<tr>';
            html+='<td>'+resp.id+'</td>'
            html+='<td>'+resp.regnnumber+'</td>';
           html+='<td>'+resp.bookingdate+'</td>';
           html+='<td>'+resp.bookingtime+'</td>';
           html+='<td>'+resp.status+'</td>';
           
           
           html+='<td><button type="button" id="resp.id" class="btn_confirm btn-info">confirm</button></td>';
           html+='<td><button type="button" id="resp.id" class="btn_confirm btn-info">cancel</button></td>';
                html+='</tr>';
          
      console.log(resp);
      //console.log(status);
      $('#replace_'+resp.id ).replaceWith(html); 
     }
      });
      });
      return false;
    
  });
    
     $(document).ready(function(){
    $(".btn_cancel").click(function(){
        var id=$(this).attr('id');
         console.log(id);
      $.ajax({
        
       url:"ajax_calls.php",
       type:'post',
       dataType:'json',
       data:{'action':'cancel_status', 
       "id":id  },
  
     
     success:function(resp)
     {
      
         var html = '<tr>';
            html+='<td>'+resp.id+'</td>'
            html+='<td>'+resp.regnnumber+'</td>';
           html+='<td>'+resp.bookingdate+'</td>';
           html+='<td>'+resp.bookingtime+'</td>';
           html+='<td>'+resp.status+'</td>';
           
           
           html+='<td><button type="button" id="resp.id" class="btn_confirm btn-info">confirm</button></td>';
           html+='<td><button type="button" id="resp.id" class="btn_confirm btn-info">cancel</button></td>';
                html+='</tr>';
          
      console.log(resp);
      //console.log(status);
      $('#replace_'+resp.id ).replaceWith(html); 
     }
      });
      });
      return false;
    
  });
    </script>

</body>

</html>