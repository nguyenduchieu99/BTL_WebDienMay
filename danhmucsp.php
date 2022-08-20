<?php
  				 include_once('db/connect_db.php');
  				 if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
  
  if(!isset($_SESSION['giohang'])){
     $_SESSION['giohang']=array();
  }
 
				if(!isset($_SESSION['danhmuc'])){$_SESSION['danhmuc']='';};
				$limit=" limit 0,6;";
				if( isset($_GET['trang'])){
					$trang=$_GET['trang'];
							$t=($trang-1)*6;
							$limit=" limit ".$t.",6 ;";
					
					}
				

				if(isset($_POST['th_id'])){
				 	$_SESSION['where']="";
					$th=$_POST['th_id'];
					$_SESSION['sql1']="SELECT  sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham where  thuonghieu_id = '$th'";
					$sql_dm=mysqli_query($con,"SELECT  thuonghieu_ten from thuonghieu where thuonghieu_id = '$th' limit 1");
				 $dm=mysqli_fetch_array($sql_dm);	
				 $_SESSION['danhmuc']=$dm['thuonghieu_ten'];		

				}
				
					if(isset($_POST['tk'])){
						$_SESSION['where']="";
					$tk=$_POST['timkiem'];
					$_SESSION['sql1']="SELECT sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham where sanpham_ten like '%$tk%'";
					$_SESSION['danhmuc']='kết quả tìm kiếm';
					
				}
                 if(isset($_GET['id'])){
                 	$_SESSION['where']="";
				 $id=$_GET['id'];
				 $sql_dm=mysqli_query($con,"SELECT  * from loai where loai_id = '$id' limit 1");
				 $dm=mysqli_fetch_array($sql_dm);	
				 $_SESSION['danhmuc']=$dm['loai_ten'];			
				 $_SESSION['sql1']="SELECT  sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham where loai_id = '$id'";
								}
				 if(isset($_GET['loaiid'])&&isset($_GET['thid'])){
				 	$_SESSION['where']="";
				 $id=$_GET['loaiid'];$th=$_GET['thid'];
				 $sql_dm=mysqli_query($con,"SELECT  * from loai where loai_id = '$id' limit 1");
				 $dm=mysqli_fetch_array($sql_dm);	
				 $_SESSION['danhmuc']=$dm['loai_ten'];			
				 $_SESSION['sql1']="SELECT  * from sanpham where loai_id = '$id' and thuonghieu_id = '$th'";
								}
				 
				
				if(isset($_GET['pk'])){
					$_SESSION['where']="";
					$_SESSION['danhmuc']="Phụ Kiện";
					$_SESSION['sql1']="SELECT  sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham,loai where sanpham.loai_id=loai.loai_id and sanpham_pk=1";	
				}
				
		     
				if(isset($_GET['bigsale'])){
					$_SESSION['where']="";
					$_SESSION['danhmuc']="Khuyến mãi";
					$_SESSION['sql1']="SELECT  sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham,loai where sanpham_km>0 and (sanpham_km/sanpham_gia)>0.2 ";	
				}	
				if(isset($_GET['new'])){
					$_SESSION['where']="";
					$_SESSION['danhmuc']="Mới nhất";
					$_SESSION['sql1']="SELECT  sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham where DATE_ADD(sanpham_ngay, INTERVAL 90 DAY)>=CURRENT_DATE() ";	
				}			
				 	
				
            
            if(isset($_POST['loc']))
            {
					$_SESSION['danhmuc']="Kết quả lọc";
					$_SESSION['where']="";
					$_SESSION['sql1']="SELECT  sanpham_id,sanpham_ten,sanpham_gia,sanpham_km,sanpham_img,sanpham_ngay from sanpham where sanpham_soluong>0 ";
					if(isset($_POST['bomay'])){
						
						$kt=1;
						$_SESSION['sql1']=$_SESSION['sql1']." and ( ";
						foreach($_POST['bomay'] as $value){
							if($kt==1){
								$_SESSION['sql1']=$_SESSION['sql1']." bomay_id= '$value'";
								$kt=2;
							}
							else{
								$_SESSION['sql1']=$_SESSION['sql1']." or  bomay_id= '$value' ";
							}
							
						}
						$_SESSION['sql1']=$_SESSION['sql1']." ) ";
						
					}
					if(isset($_POST['loai_l'])){
						$kt=1;
						$_SESSION['sql1']=$_SESSION['sql1']." and ( ";
						foreach($_POST['loai_l'] as $value){
							if($kt==1){
								$_SESSION['sql1']=$_SESSION['sql1']." loai_id= '$value'";
								$kt=2;
							}
							else{
								$_SESSION['sql1']=$_SESSION['sql1']." or  loai_id= '$value' ";
							}
							
						}
						$_SESSION['sql1']=$_SESSION['sql1']." ) ";
						
					}
					if(isset($_POST['thuonghieu'])){
						$kt=1;
						$_SESSION['sql1']=$_SESSION['sql1']." and ( ";
						foreach($_POST['thuonghieu'] as $value){
							if($kt==1){
								$_SESSION['sql1']=$_SESSION['sql1']." thuonghieu_id= '$value' ";
								$kt=2;
							}
							else{
								$_SESSION['sql1']=$_SESSION['sql1']." or  thuonghieu_id= '$value' ";
							}
							
						}
						$_SESSION['sql1']=$_SESSION['sql1']." ) ";
						
					}
					if(isset($_POST['day'])){
						$kt=1;
						$_SESSION['sql1']=$_SESSION['sql1']." and ( ";
						foreach($_POST['day'] as $value){
							if($kt==1){
								$_SESSION['sql1']=$_SESSION['sql1']." day_id= '$value'";
								$kt=2;
							}
							else{
								$_SESSION['sql1']=$_SESSION['sql1']." or  day_id= '$value' ";
							}
							
						}
						$_SESSION['sql1']=$_SESSION['sql1']." ) ";
					}
					if(isset($_POST['gia'])){
						$kt=1;
						$_SESSION['sql1']=$_SESSION['sql1']." and ( ";
						foreach($_POST['gia'] as $value){
							if($kt==1){
								$_SESSION['sql1']=$_SESSION['sql1']." sanpham_gia <= '$value'";
								$kt=2;
							}
							else{
								$_SESSION['sql1']=$_SESSION['sql1']." or  sanpham_gia <= '$value' ";
							}
							
						}
						$_SESSION['sql1']=$_SESSION['sql1']." ) ";
						
					}

					if(isset($_POST['size'])){
						$kt=1;
						$_SESSION['sql1']=$_SESSION['sql1']." and ( ";
						foreach($_POST['size'] as $value){
							if($kt==1){
								$_SESSION['sql1']=$_SESSION['sql1']." size_id= '$value'";
								$kt=2;
							}
							else{
								$_SESSION['sql1']=$_SESSION['sql1']." or  size_id= '$value' ";
							}
							
						}
						$_SESSION['sql1']=$_SESSION['sql1']." ) ";
						
					}
					
				}


				
		   
            if(isset($_POST['xapsep'])){
            	$_SESSION['order']="";
					$kt=$_POST['agileinfo_search'];
					if($kt==2){
						$_SESSION['order']=" order by sanpham_gia asc ";
					}elseif($kt==1){
						$_SESSION['order']=" order by sanpham_gia desc ";
					}elseif($kt==3){
						$_SESSION['order']=" order by sanpham_ngay desc ";
					}elseif($kt==4){
						$_SESSION['order']=" order by sanpham_km desc ";
					}
					
				}

				
		      	$_SESSION['sql2']=$_SESSION['sql1'];
		      	 $sql_hot1=mysqli_query($con,$_SESSION['sql2']);
								$sp_count= mysqli_num_rows($sql_hot1);
								$sp_buttun=$sp_count/6;
								$_SESSION['trang']=ceil($sp_buttun);
	 if($_SESSION['trang']<1){
  	 $limit=" limit 0,6;";
  }
		      
		      if(isset($_SESSION['order'])&& $_SESSION['order']!=""){
		      	$_SESSION['sql2']=$_SESSION['sql2'].$_SESSION['order'];
		      }
			

				

  $_SESSION['sql']=$_SESSION['sql2'] . $limit;
				
				?>
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Trang Chủ</a>
						<i>|</i>
					</li>
					<li><?php echo $_SESSION['danhmuc'] ?></li>
				</ul>
			</div>
		</div>
	</div>

<div class="ads-grid py-sm-5 py-4">
		<div  style="width:100%; margin: unset; margin-right: 0px; padding: 0px 30px;">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row" style="justify-content: space-between; width:100%; margin:unset;">
				<?php include_once('include/left.php'); ?>
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9" style="max-width: 60%;">
					<div class="wrapper">
						
						<!-- second section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php 
								$sql_hot=mysqli_query($con,$_SESSION['sql']);
								
							while($row_hot=mysqli_fetch_array($sql_hot)) { ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_hot['sanpham_img']?>" style='width: 160px;height: 250px;'>
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_hot['sanpham_id']  ?>" class="link-product-add-cart">xem chi tiết</a>
												</div>
											</div>
											

										</div>
										<div class="item-info-product text-center border-top mt-4" >
											<h4 class="pt-1">
												<a href="?quanly=chitietsp&id=<?php echo $row_hot['sanpham_id']  ?>"><?php echo $row_hot['sanpham_ten'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo currency_format($row_hot['sanpham_gia'])  ?></span>
												<del><?php echo currency_format($row_hot['sanpham_km']) ?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
													<fieldset>
														<input type="hidden" name="tensp" value="<?php echo $row_hot['sanpham_ten']  ?>" />
														<input type="hidden" name="sanpham_id" value="<?php echo $row_hot['sanpham_id']  ?>" />
														<input type="hidden" name="sanpham_hinhanh" value="<?php echo $row_hot['sanpham_img']  ?>" />
														<input type="hidden" name="sanpham_gia" value="<?php echo $row_hot['sanpham_gia']  ?>" />
														<input type="hidden" name="sanpham_sl" value="1" />
														<?php if($_SESSION['khachhang_ten']!=''){ ?>
														<input type="submit" name="themgiohang" value="thêm giỏ hàng" class="button btn" />
													<?php } else{ ?>
														<input type="button" data-toggle="modal" data-target="#dangnhap" value="thêm giỏ hàng" class="button btn" />
													<?php } ?>
													</fieldset>
												</form>
											</div>

										</div>
									</div>
								</div>
						   <?php } ?>
							</div>

							
						</div>

							<?php 
							$i=0;
							if(isset($_SESSION['trang'])&&$_SESSION['trang']>1){
							
							for($i=1;$i<=$_SESSION['trang'];$i++){
								echo' <a style="margin:0 5px;" href="?quanly=danhmuc&trang='.$i.'">'.$i.'</a>';
							}}
							
							 ?>
						<!-- //second section -->
						<!-- third section -->
						
					</div >
				</div>
				<div style="display: flex; width: 18%; height: 100%; z-index: 99; justify-content:space-between;">
					<form action="?quanly=danhmuc" method="POST" enctype="multipart/form-data">
						<select style="width: 65%;height: 48px;border-radius: 15px;" id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option  >Sắp xếp</option>
							<option value="1">Giá cao đến thấp</option>
							<option value="2">Giá thấp đến cao</option>
							<option value="3">Mới nhất</option>
							<option value="4">Khuyến mãi</option>
							
						</select>

							<input type="submit" name="xapsep" style="height: 46px;
    margin-left: 2px;
    margin-top: -6px;
    border-radius: 10px;
    color: white;
    background: #0879c9;
    border: unset;" class="btn btn-default" value="Sắp xếp">

					</form>	


				</div>

				<!-- //product left -->
            
				<!-- product right -->

				
					<!-- //product right -->
					<!-- //product right -->
				</div >
			</div>
		</div>
	</div>
	

