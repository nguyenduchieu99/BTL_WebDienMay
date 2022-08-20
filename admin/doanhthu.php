<div style="padding-top:1px; display: flex;" >
	 <ul class="navbar-nav" style="background: #0879c9; padding: 0px 20px 10px 20px ;width:15% ;">
      <li class="nav-item active" style="position:relative;">
        <a class="nav-link" href="?quanly=doanhthutuan" style="color:white;">Doanh thu tuần</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?quanly=doanhthuthang" style="color:white;">Doanh thu tháng</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="?quanly=doanhthunam" style="color:white;">Doanh thu năm</a>
      </li>
       </li>
       <li class="nav-item active">
        <a class="nav-link" href="?quanly=doanhthutk" style="color:white;">Tìm kiếm</a>
      </li>
  </ul>
<?php 
$tong=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id;"));
 ?>
  <div style="width: 85%;padding: 20px;">
  	<div style="display: flex;width: 100%;justify-content: space-between;text-align: center;align-content: center;">
  		<div style="width: 30%;border:1px solid #0879c9 ; height:100px; text-align: center;align-content: center;border-radius: 10px; padding-top: 10px;">
  			<h4> 
  				Tổng Tiền
  			</h4>
  			<h3 style="color:red;font-size:500;">
  				<?php echo currency_format($tong["tien"]); ?>
  			</h3>
  		</div>
  		<div style="width: 30%;border:1px solid #0879c9 ; height:100px; text-align: center;align-content: center;border-radius: 10px; padding-top: 10px;">
  			<h4> 
  				Số lượng sản phẩm đã bán
  			</h4>
  			<h3 style="color:red;font-size:500;">
  				<?php echo $tong["sl"]; ?>
  			</h3>
  		</div>
  		<div style="width: 30%;border:1px solid #0879c9 ; height:100px; text-align: center;align-content: center;border-radius: 10px; padding-top: 10px;">
  			<h4> 
  				Tổng đơn
  			</h4>
  			<h3 style="color:red;font-size:500;">
  				<?php echo $tong["dh"]; ?>
  			</h3>
  		</div>
  	</div>
  </div>


</div>
