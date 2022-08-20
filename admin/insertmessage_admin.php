<?php 
   
   include_once('../db/connect_db.php');
   session_start();
   if(isset($_POST['message_admin'])){
      $kh_id=$_SESSION['khid'];
      $msg=$_POST['message_admin'];
      mysqli_query($con,"INSERT INTO `messages`(`khachhang_id`, `message`, `action`) VALUES ('$kh_id','$msg','0')");
   }
?>