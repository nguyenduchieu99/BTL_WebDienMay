<?php 
   
   include_once('../db/connect_db.php');
   session_start();
   
   if(isset($_POST['kh_id_admin'])){
      $kh_id=$_SESSION['khid'];
      $kh=mysqli_fetch_array(mysqli_query($con,"SELECT * from khachhang WHERE khachhang_id='$kh_id'"));
      $output="";
      $msgs=mysqli_query($con,"SELECT `id`, `khachhang_id`, `message`, `action` FROM `messages` WHERE khachhang_id='$kh_id'");
      while($msg=mysqli_fetch_array($msgs)){
         if($msg["action"]==1){
            $output='<div style="width:100%; display:flex;"><p style="max-width: 210px;background:#0879c9;color:#fff;padding:10px;border-radius: 10px;line-height:20px;margin-bottom: 5px; text-align: justify; font-size: 13px; right: 10px;word-break: break-all;">'.$msg["message"].'</p></div>'.$output;
         }
         else{
            $output='<div style="width:100%; display:flex;justify-content: end;"><p style="max-width: 210px;background: #fff; color:#000;padding: 10px; border-radius:10px;line-height:20px;margin-bottom: 5px; text-align: justify; font-size: 13px; right: 10px;word-break: break-all;">'.$msg["message"].'</p></div>'.$output;
         }
      }
      $output.='<div style="display:flex;margin-bottom:20px;position:fixed;background:#004;padding:10px;bottom:370px;"><img src="../images/user.jpg" style="width:35px;height: 35px; border-radius: 100%;margin-right: 10px;"><button class="btchat" style="display:flex; flex-direction: column; border:unset; background:unset;z-index:10;color:#fff;">
          <h6 style="line-height: 0px;padding-top: 15px;">
            '.$kh["khachhang_ten"].'
          </h6></div>';
      echo $output;
   }
?>