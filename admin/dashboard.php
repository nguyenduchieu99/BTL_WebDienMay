<?php 
include_once('../db/connect_db.php');
session_start();
if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
  if(!isset($_SESSION['khid'])){
    $_SESSION['khid']='';
  }
  if(!isset($_SESSION['th'])){
    $_SESSION['th']=2;
  }

  if(isset($_POST['ikofkh'])){
    $_SESSION['khid']=$_POST['ikofkh'];
    $kh_id=$_SESSION['khid'];
    mysqli_query($con,"UPDATE `khachhang` SET `khachhang_msg`='0' WHERE khachhang_id='$kh_id'");
  }

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<meta charset="utf-8">
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
	<title>Admin</title>
</head>
<body>
<p>Xin chào : <?php echo $_SESSION['admin']?>  <a href="index.php" style="padding-left:20px">Đăng Xuất</a></p>
<nav class="navbar navbar-expand-lg navbar-light " style="background:#0879c9; color: white;">
  
  <div class="collapse navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav" style="color:white;" >
      <li class="nav-item active" style="position:relative;">
        <a class="nav-link" href="?quanly=donhang" style="color:white;">Đơn hàng <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?quanly=danhmuc"  style="color:white;">Danh mục</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="?quanly=thuonghieu"  style="color:white;">Thương hiệu</a>
      </li>
       </li>
       <li class="nav-item active">
        <a class="nav-link" href="?quanly=bomay"  style="color:white;">Bộ máy</a>
      </li> </li>
       <li class="nav-item active">
        <a class="nav-link" href="?quanly=day"  style="color:white;">Loại day</a>
      </li> </li>
       <li class="nav-item active">
        <a class="nav-link" href="?quanly=size"  style="color:white;">size</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?quanly=sanpham"  style="color:white;">Sản phẩm</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="?quanly=khachhang"  style="color:white;">Khách hàng</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link " href="?quanly=doanhthu"  style="color:white;">Doanh thu</a>
      </li>
      <li class="nav-item active">
        <button class="nav-link bt_messages" style="border: unset;background: unset;color: white;" >Message</button>
        <div class="tb_msg">
        
        <div>
      </li>
    </ul>
  </div>
 
</nav>
 <?php 
  $quanly;
  if(isset($_GET['quanly'])){
  	$quanly=$_GET['quanly'];
  }else{$quanly='';}
  if($quanly=='danhmuc'){
  	include_once('xulydanhmuc.php');
  }elseif($quanly=='sanpham'){
  	include_once('xulysanpham.php');
  }elseif($quanly=='khachhang'){
  	include_once('xulykhachhang.php');
  }elseif($quanly=='donhang'){
    include_once('xulydonhang.php');
  }
  elseif($quanly=='thuonghieu'){
    include_once('xulythuonghieu.php');
  }elseif($quanly=='bomay'){
    include_once('xulybomay.php');
  }elseif($quanly=='day'){
    include_once('xulyloaiday.php');
  }elseif($quanly=='size'){
    include_once('xulysize.php');
  }elseif($quanly=='csl'){
    include_once('donhang_csl.php');
  }
  elseif($quanly=='dsl'){
    include_once('donhang_dsl.php');
  }
  elseif($quanly=='ht'){
    include_once('donhang_ht.php');
  }
  elseif($quanly=='doanhthu'){
    include_once('doanhthu.php');
  }
 elseif($quanly=='doanhthutuan'){
    include_once('doanhthutuan.php');
  }elseif($quanly=='doanhthuthang'){
    include_once('doanhthuthang.php');
  }
 elseif($quanly=='doanhthunam'){
    include_once('doanhthunam.php');
  }
 elseif($quanly=='doanhthutk'){
    include_once('doanhthutk.php');
  }
  else{
    include_once('xulysanpham.php');
  }
  ?>

  <div class="list_khachhang" style="position:fixed;bottom: 10px; right: 10px; padding:10px;background-color:#0879c9;width: 300px;height: 630px;border-radius: 10px; color: white;overflow: auto;scrollbar-width: none;-ms-overflow-style: none;">
    <h2 style="text-align: center;margin-bottom: 20px;">Message</h2>
    <div class="listmsgbody" style="display: flex; flex-direction:column;">
     
    </div>
  </div>
  <div class="msgs_khachhang" style="position:fixed;bottom: 10px; right: 350px;border-radius: 10px;">
    <div class="bodytinnhan">
      <div class="tat_chat"><img src="../images/x.png" style="z-index: 10;width: 20px; height:20px;position: absolute; top: 15px; right:10px;"></div>
    <div style="width: 300px;height: 400px; display: flex; flex-direction:column; background: #004 ; border-radius:10px 10px 0px 0px;padding: 10px;position: relative;z-index: 9; overflow: auto;scrollbar-width: none;-ms-overflow-style: none;padding-top: 60px; flex-direction: column-reverse;" class="msgbody">

      
    </div>

         
        <div style="display: flex; width: 100% ;z-index: 20;">
         <!--  <input type="text" class="kh_id" value="" hidden> -->
          <textarea   placeholder="Aa...." type="text" class="message" style="resize: none;font-size: 13px;width: 80%; border: 1px solid #0879c9;height: 36px;border-radius: 0px 0px 0px 10px; padding: 7px;word-break: break-all;"></textarea>
          
          <button class="btmessage" style="width: 20%; background:#0879c9 ;color: white;height: 36px;border-radius: 0px 0px 10px 0px;border: unset;"> Gửi</button>
        </div> 
        </div>


  </div>
  <script type="text/javascript">
    $(document).ready(function(){

      $(".list_khachhang").hide();
       $(".msgs_khachhang").hide();
       $(".bt_messages").click(function(){
        $(".list_khachhang").toggle();
       });

        $(".tat_chat").click(function(){
        $(".msgs_khachhang").hide();
       });


       setInterval(function(){
        $.ajax({
          url:"listmsg.php",
          success:function(data){
            $(".listmsgbody").html(data);
          }
        });
      },1500);

       setInterval(function(){
        $.ajax({
          url:"tb_msg.php",
          success:function(data){
            $(".tb_msg").html(data);
          }
        });
      },500);


      setInterval(function(){
        $.ajax({
          url:"readtimechatadmin.php",
          method:"post",
          data:{
            kh_id_admin:1
          },
          dataType:"text",
          success:function(data){
            $(".msgbody").html(data);
          }
        });
      },700);

      $(".btmessage").on("click",function(){
        $.ajax({
          url:"insertmessage_admin.php",
          method:"post",
          data:{
            message_admin:$(".message").val()
          },
          dataType:"text",
          success:function(data) {
            $(".message").val('');
          }
        });
      });


    });
   
  </script>
  <style type="text/css">
    .msgbody::-webkit-scrollbar { 
  width: 0 !important;
  display: none; 
}
  </style>
</body>
</html>