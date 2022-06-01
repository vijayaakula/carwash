<?php
include('db.php');
//hi change here
if(isset($_POST['action'])&&($_POST['action']=='confirm_status')){
    $id=$_POST['id'];
    $st="confirmed";
    $upd="UPDATE booking SET status='$st' where id='$id'";
    $query=mysqli_query($conn,$upd);
  $sel="SELECT * FROM booking where id='$id'";
  $selquery=mysqli_query($conn,$sel);
  $array=mysqli_fetch_assoc($selquery);
  echo json_encode($array);
}

if(isset($_POST['action'])&&($_POST['action']=='cancel_status')){
  $id=$_POST['id'];
  $st="cancelled";
  $upd="UPDATE booking SET status='$st' where id='$id'";
  $query=mysqli_query($conn,$upd);
$sel="SELECT * FROM booking where id='$id'";
$selquery=mysqli_query($conn,$sel);
$array=mysqli_fetch_assoc($selquery);
echo json_encode($array);
}
?>