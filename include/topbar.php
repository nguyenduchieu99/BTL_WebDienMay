	<?php 
	
	if(isset($_GET['dangxuat'])){
		$_SESSION['khachhang_ten']='';
		$_SESSION['khachhang_id']='';
		$_SESSION['khachhang_email']='';
		session_destroy();
	}
	if(isset($_POST['dangnhap'])){
		$email=$_POST['email'];
		$mk=md5($_POST['mk']);
		$kt=mysqli_num_rows(mysqli_query($con,"SELECT * from khachhang WHERE khachhang_email='$email' and khachhang_matkhau='$mk'"));
		if($kt<1){
			echo "<script> alert('tài khoản mật khẩu không đúng')</script>";
		}else{
			$row=mysqli_fetch_array(mysqli_query($con,"SELECT * from khachhang WHERE khachhang_email='$email' and khachhang_matkhau='$mk'"));
			$_SESSION['khachhang_ten']=$row['khachhang_ten'];
		        $_SESSION['khachhang_id']=$row['khachhang_id'];
		        $_SESSION['khachhang_email']=$row['khachhang_email'];
		}
	}
	if(isset($_POST['chinhsuathongtin'])){
		$ten=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['sdt'];
		$id=$_SESSION['khachhang_id'];
		/*if($mk==$mk1){*/#
		$ktgmail=mysqli_num_rows(mysqli_query($con,"select * from khachhang where khachhang_email='$email' "));
		if($ktgmail<1 && $email!=$_SESSION['khachhang_email']){
			mysqli_query($con,"UPDATE `khachhang` SET `khachhang_email`='$email',`khachhang_sdt`='$phone',`khachhang_ten`='$ten' WHERE khachhang_id='$id'");
			echo "<script> alert('Thay đổi thàng công')</script>";
		}elseif($ktgmail>0 && $email==$_SESSION['khachhang_email']){
			mysqli_query($con,"UPDATE `khachhang` SET `khachhang_email`='$email',`khachhang_sdt`='$phone',`khachhang_ten`='$ten' WHERE khachhang_id='$id'");
			echo "<script> alert('Thay đổi thành công')</script>";
		}else{
			echo "<script> alert('Email đã tồn tại')</script>";
		}
	}
	if(isset($_POST['qmk'])){
		$email=$_POST['email'];
		$mkm=random_int(1000,10000);
		$mk=md5($mkm);
		$ktgmail=mysqli_num_rows(mysqli_query($con,"select * from khachhang where khachhang_email='$email' "));
		if($ktgmail<1){
			echo "<script> alert('email này chưa được đăng ký')</script>";
		}else{
			$sendmail=mail($email, "thông báo", "mật khấu mới của bạn : ".$mkm, "From: cuahangdongho");
			mysqli_query($con,"UPDATE `khachhang` SET `khachhang_matkhau`='$mk' WHERE khachhang_email='$email'");
			echo "<script> alert('mật khấu mới đang được gửi đến email cho bạn')</script>";
		}
	}
	if(isset($_POST['doimatkhau'])){
		$email=$_SESSION['khachhang_email'];
		$mk=md5($_POST['mk']);
		$mkm=$_POST['mkm'];
		$nlmk=$_POST['nlmk'];
		$kt=mysqli_num_rows(mysqli_query($con,"select * from khachhang where khachhang_email='$email' and khachhang_matkhau='$mk'"));
		if($kt<1){
			echo "<script> alert('Mật khẩu không chính sác')</script>";
		}elseif($mkm!=$nlmk){
			echo "<script> alert('Mật khẩu nhập lại không chùng khớp')</script>";
		}else{
			$mk=md5($mkm);
			mysqli_query($con,"UPDATE `khachhang` SET `khachhang_matkhau`='$mk' WHERE khachhang_email='$email'");
			echo "<script> alert('Thay đổi mật khẩu thành công')</script>";
		}
	}

    if(isset($_POST['dangky'])){
		$ten=$_POST['name'];
		$email=$_POST['email'];
		$mk=md5($_POST['password']);
		$ma=random_int(1000, 10000);
		/*$mk1=md5($_POST['password1']);*/
		$phone=$_POST['sdt'];
		/*if($mk==$mk1){*/#
		$ktgmail=mysqli_num_rows(mysqli_query($con,"select * from khachhang where khachhang_email='$email' "));
		if($ktgmail<1){
			$sendmail=mail($email, "thông báo", "code : ".$ma, "From: cuahangdongho");
			if($sendmail){
				
			mysqli_query($con,"INSERT INTO `khachhang`(`khachhang_ten`, `khachhang_sdt`, `khachhang_email`,`khachhang_matkhau`,`khachhang_ma`) VALUES ('$ten','$phone','$email','$mk','$ma')");
			$sql=mysqli_query($con,"SELECT *  from khachhang order by khachhang_id desc limit 1");
			$row=mysqli_fetch_array($sql);
			$_SESSION['khachhang_ten']=$row['khachhang_ten'];
		    $_SESSION['khachhang_id']=$row['khachhang_id'];
		    $_SESSION['khachhang_email']=$row['khachhang_email'];
		    header("Location: http://localhost/bandienmay2/dangky.php");
		
			
			}else{
					echo "<script> alert('đăng ký không thành công xem lại email')</script>";
			}
			
		// else{
		// 	echo "<script> alert('đăng ký không thành công xem lại email')</script>";
		// }
		}else{
			echo "<script> alert('gmail đã đăng ký')</script>";

		}
		/*}
		else{echo "<script> alert ('xem lại passwork') </script>";}*/

	}


	?>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top" style="position: relative;">
					
					
						<?php
					if($_SESSION['khachhang_ten']!='' && $_SESSION['khachhang_id']!=''){  ?>
						<p class="text-white text-lg-left text-center canhan">
							<img src="images/user.jpg" style="height: 26px;border-radius: 100%; z-index: 99;">
							<?php echo $_SESSION['khachhang_ten'] ?>
							<i class="fas fa-shopping-cart ml-1"></i> 

							<!-- <a href="index.php?dangxuat=1" style="color:red;">Đăng Xuất</a> -->

					</p> 

					<?php }else{}; ?>
						
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<?php 
						if($_SESSION['khachhang_ten']!=''){
						 ?>
						
						
						<li class="text-center border-right text-white">
							<a href="?quanly=xemdonhang" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Xem Đơn Hàng</a>
						</li>
					<?php } ?>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 6969696969
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Đăng Nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng Ký</a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
			<div class="caidat_canhan" style=" display: flex; flex-direction: column;position: absolute; margin-top: 0px; background-color:#0879c9;color:#fff; left: 0px;padding: 0px 20px; border-bottom-right-radius: 10px;border-bottom-left-radius: 10px; z-index: 99; ">
				<ul style="list-style-type: none !important;">
					<li class="btcstt" style="border-top: 1px solid #fff; padding:10px 0px;">Chỉnh sửa thông tin</li>
					<li class="bttdmk" style="border-top: 1px solid #fff; padding:10px 0px;">Thay đổi mật khẩu</li>
					<li style="border-top: 1px solid #fff; padding:10px 0px;"><a href="?quanly=xemdonhang" style="color: #fff;"> Chờ giao hàng</a></li>
					<li style="border-top: 1px solid #fff; padding:10px 0px;"><a href="?quanly=lichsumuahang" style="color: #fff;"> Lịch sử mua hàng</a></li>
					<li  style="border-top: 1px solid #fff; padding:10px 0px;"><a href="index.php?dangxuat=1" style="color:red;">Đăng Xuất</a></li>
					
				</ul>
			</div>



			<div class="thaydoimatkhau" style=" display: flex; flex-direction: column;position: absolute; margin-top: 0px; background-color:#0879c9;color:#fff; left: 556px;top: 62px;padding: 0px 20px; border-bottom-right-radius: 10px;border-bottom-left-radius: 10px; z-index: 99; " tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Thay đổi mật khẩu</h5>
					<button type="button" class="close close_tdmk" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="mk" required="">
						</div>
						
						<div class="form-group">
							<label class="col-form-label">Mật khẩu mới</label>
							<input type="password" class="form-control" placeholder=" " name="mkm" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="nlmk" required="">
						</div>
						
						<div class="right-w3l" >
							<input type="submit" class="form-control" name="doimatkhau" value="Lưu">
							
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="chinhsuathongtin" style=" display: flex; flex-direction: column;position: absolute; margin-top: 0px; background-color:#0879c9;color:#fff; left: 556px;top: 62px;padding: 0px 20px; border-bottom-right-radius: 10px;border-bottom-left-radius: 10px; z-index: 99;  " tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width: 440px;" >
				<div class="modal-header">
					<h5 class="modal-title">Chỉnh sửa thông tin cá nhân</h5>
					<button type="button" class="close close_tdmk" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
				$email=$_SESSION['khachhang_email'];
				$tt=mysqli_fetch_array(mysqli_query($con,"SELECT * from khachhang WHERE khachhang_email='$email'")); 
				 ?>
				<div class="modal-body">
					<form action="" method="post" data-toggle="modal" data-target="#macode" >
						<div class="form-group">
							<label class="col-form-label">Tên Khách Hàng</label>
							<input type="text"  class="form-control" placeholder=" " name="name" required="" value="<?php echo $tt['khachhang_ten']; ?>">
						</div>
						<div class="form-group">
							<label class="col-form-label">Số Điện Thoại</label>
							<input minlength="10" type="number" class="form-control" placeholder=" " name="sdt" required=""  value="<?php echo $tt['khachhang_sdt']; ?>" >
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input onclick="gmail(this.value)" id="email" type="email" class="form-control" placeholder=" " name="email" required="" value="<?php echo $tt['khachhang_email']; ?>" ><br>
							<span id="thongbao"></span>
						</div>
						
						<div class="right-w3l">
						
							<input type="submit" class="form-control" name="chinhsuathongtin" value="Lưu"></i></a>
						</li>
							
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal(select-location) -->
	
	<!-- //shop locator (popup) -->

	<!-- modals -->
	
	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng Nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" placeholder=" " name="email" required="">
						</div>
						
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="mk" required="">
						</div>
						
						<div class="right-w3l" >
							<input type="submit" class="form-control" name="dangnhap" value="Đăng nhập">
							
						</div>
						<div  style="display: flex;justify-content: center;" >
							<input type="submit" name="qmk" value="Quên mật khẩu" style="background-color:unset; border: unset; color:red;">
						</div>
						
						
						<p class="text-center dont-do mt-3">chưa có tài khoản
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng Ký</a>
								
						</p>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng Ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post" data-toggle="modal" data-target="#macode" >
						<div class="form-group">
							<label class="col-form-label">Tên Khách Hàng</label>
							<input type="text"  class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Số Điện Thoại</label>
							<input minlength="10" type="number" class="form-control" placeholder=" " name="sdt" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input onclick="gmail(this.value)" id="email" type="email" class="form-control" placeholder=" " name="email" required=""><br>
							<span id="thongbao"></span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật Khẩu</label>
							<input type="password" minlength="6" class="form-control" placeholder=" " name="password" required="">
						</div>
						
						<div class="right-w3l">
						
							<input type="submit" class="form-control" name="dangky" value="đăng ký"></i></a>
						</li>
							
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.html" class="font-weight-bold font-italic">
							<img src="images/logo.jfif" alt=" " class="img-fluid">Nóm 16
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="?quanly=danhmuc" method="post">
								<input class="form-control mr-sm-2" name="timkiem" type="search" placeholder="Search" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name="tk" type="submit">Tìm Kiếm</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<?php if(!($_SESSION['khachhang_id']=="")){ ?>
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="?quanly=giohang" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						</div>
					<?php } ?>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(document).ready(function(){
  $(".caidat_canhan").hide();
  $(".canhan").click(function(){
    $(".caidat_canhan").toggle();
  });

  $(".bttdmk").click(function(){
  	$(".thaydoimatkhau").toggle();
  });
  $(".thaydoimatkhau").hide();
  $(".close_tdmk").click(function(){
  	$(".thaydoimatkhau").hide();
  	$(".chinhsuathongtin").hide();
  });
  $(".chinhsuathongtin").hide();
  $(".btcstt").click(function(){
  	$(".chinhsuathongtin").toggle();
  });

});
</script>