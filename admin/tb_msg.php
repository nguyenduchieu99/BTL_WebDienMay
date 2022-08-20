<?php 
   
   include_once('../db/connect_db.php');
   session_start();
   $output="";
   $tb=mysqli_fetch_array(mysqli_query($con,"SELECT sum(khachhang_msg) tong from khachhang"));
   if($tb["tong"]>0){
   	$output='<p style="line-height: 18px;width: 20px;height: 20px;background: red;color: white;text-align: center;border-radius:100%;margin-top: -41px;font-size: 16px;margin-left: 74px;">'.$tb["tong"].'</p>';
   }
   echo $output;
?>