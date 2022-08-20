<?php 
   
   include_once('db/connect_db.php');
   session_start();
   
   if(isset($_POST['message']) && isset($_POST['kh_id']) && $_POST['message']!=""){
      $kh_id=$_POST['kh_id'];
      $msg=$_POST['message'];
      mysqli_query($con,"INSERT INTO `messages`(`khachhang_id`, `message`, `action`) VALUES ('$kh_id','$msg','1')");
      mysqli_query($con,"UPDATE `khachhang` SET `khachhang_msg`='1' WHERE khachhang_id='$kh_id'");
   }
?>