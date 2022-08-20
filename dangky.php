<?php 
   

   include_once('db/connect_db.php');
   session_start();
   if(!isset($_COOKIE['sql'])){
   	$_COOKIE['sql']="";
   }
  if(!isset($_SESSION['giohang'])){
     $_SESSION['giohang']=array();
  }
  if(!isset($_SESSION['khachhang_ten'])&& !isset($_SESSION['khachhang_id'])&& !isset($_SESSION['where']) ){
  	$_SESSION['khachhang_ten']="";
  	$_SESSION['khachhang_id']="";
  	$_SESSION['where']="";
  }
  



  if(isset($_POST['xacnhan'])){
  	$ma=$_POST['ma'];
  	$id=$_SESSION['khachhang_id'];
  	$kt=mysqli_num_rows(mysqli_query($con,"select * from khachhang where khachhang_id='$id' and khachhang_ma='$ma'"));
  	if($kt<1){
  		mysqli_query($con,"DELETE FROM `khachhang` WHERE where khachhang_id='$id' ");
  		$_SESSION['khachhang_ten']="";
  	    $_SESSION['khachhang_id']="";
  	    $_SESSION['khachhang_email']="";
  	    echo "<script> alert('Mã xác minh không chính xác')</script>";
  	   
  	}else{
  		// header('location:http://localhost/bandienmay2/');
  		 echo "<script> alert('bạn đã đăng ký thành công')</script>";
  		header("Location: http://localhost/bandienmay2/");
  	}
  }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>web bán đồng hồ</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

</head>

<body>

		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">nhập mã code</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">mã xác minh đang được gửi tới gmail của bạn</label>
							<input type="password" class="form-control" placeholder=" " name="ma" required="">
						</div>
						
						<div class="right-w3l">
							<input type="submit" class="form-control" name="xacnhan" value="Xác Nhận">
						</div>
						
						
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>