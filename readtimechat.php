<?php 
   
   include_once('db/connect_db.php');
   session_start();
   
   if(isset($_POST['kh_id'])){
      $kh_id=$_POST['kh_id'];
      $output='<div style="width:100%; display:flex;"><p style="max-width: 210px;background:#0879c9;color:#fff;padding:10px;border-radius: 10px;line-height:20px;margin-bottom: 5px; text-align: justify; font-size: 13px; right: 10px;">Chào bạn !<br>Đồng hồ clock có thể giúp j cho bạn</p></div>';
      $msgs=mysqli_query($con,"SELECT `id`, `khachhang_id`, `message`, `action` FROM `messages` WHERE khachhang_id='$kh_id' ");
      while($msg=mysqli_fetch_array($msgs)){
         if($msg["action"]==0){
            $output='<div style="width:100%; display:flex;"><p style="max-width: 210px;background:#0879c9;color:#fff;padding:10px;border-radius: 10px;line-height:20px;margin-bottom: 5px; text-align: justify; font-size: 13px; right: 10px;word-break: break-all;">'.$msg["message"].'</p></div>'.$output;
         }
         else{
            $output='<div style="width:100%; display:flex;justify-content: end;"><p style="max-width: 210px;background: #fff; color:#000;padding: 10px; border-radius:10px;line-height:20px;margin-bottom: 5px; text-align: justify; font-size: 13px; right: 10px;word-break: break-all;">'.$msg["message"].'</p></div>'.$output;
         }
      }
      echo $output;
   }
?>