<?php 
   
   include_once('../db/connect_db.php');
   session_start();
   $kh=$_SESSION['khid'];
   $output="";
   $ng="'";
   $listchat=mysqli_query($con,"SELECT khachhang_ten,messages.khachhang_id id,max(messages.id) msg_id , message from khachhang,messages WHERE khachhang.khachhang_id=messages.khachhang_id GROUP BY khachhang_ten,messages.khachhang_id ORDER BY msg_id  desc");
   while($chat=mysqli_fetch_array($listchat)){
   	$msg=mysqli_fetch_array(mysqli_query($con,"SELECT * from messages where id =".$chat['msg_id']." ;"));
   	$tb=mysqli_fetch_array(mysqli_query($con,"SELECT khachhang_msg from khachhang where khachhang_id=".$chat['id']." ;"));
   	if($tb["khachhang_msg"]==1){
   		$output.='<div style="display:flex; margin-bottom:15px;" > 
        <img src="../images/user.jpg" style="width:35px;height: 35px; border-radius: 100%;margin-right: 10px;">
        <button class="btchat" style="display:flex; flex-direction: column; border:unset; background:unset;z-index:10;color:#fff;">
          <h7 style="line-height: 0px;padding-top: 5px;">
            '.$chat["khachhang_ten"].' 
            <div style="background: red; border-radius:100%; right:20px; width:10px;height:10px;position: fixed;right:30px;margin-top:-5px;"></div>
          </h7>
          <input type="text" class="id_idkh" hidden value="'.$chat["id"].'">
          <h7 style="width:150px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align:left;">
            '.$msg["message"].'
          </h7>
        	</button>
      </div>';
   	}else{
   		$output.='<div style="display:flex; margin-bottom:15px;" > 
        <img src="../images/user.jpg" style="width:35px;height: 35px; border-radius: 100%;margin-right: 10px;">
        <button class="btchat" style="display:flex; flex-direction: column; border:unset; background:unset;z-index:10;color:#fff;">
          <h6 style="line-height: 0px;padding-top: 5px;">
            '.$chat["khachhang_ten"].' 
          </h6>
          <input type="text" class="id_idkh" hidden value="'.$chat["id"].'">
          <h7 style="width:150px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis; text-align:left;">
            '.$msg["message"].'
          </h7>
        	</button>
      </div>';
   	}
   	
   }
   $output.='
    <script type="text/javascript">
    $(document).ready(function(){
           $(".btchat").on("click",function(){
   	       $(".msgs_khachhang").show();
   	       $.ajax({
					url:"dashboard.php",
					method:"post",
					data:{
						ikofkh:$(this).find("input[class='.$ng.'id_idkh'.$ng.']").val()
					},
					dataType:"text",
					success:function(data){
					}
				});
        });
   });
   ';
   echo $output;
?>