<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}

if(isset($_POST['capnhap'])){
  $mahang=$_POST['mahang'];
  $tr=$_POST['tinhtrang'];
  $email=$_POST['email'];
  if($tr==2){
    $sendmail=mail($email, "thông báo", "Đơn hàng: ".$mahang." của bạn đã được xử lý .", "From: cuahangdongho");
  }
  mysqli_query($con,"UPDATE `donhang` SET`donhang_tinhtrang`='$tr' WHERE ctdonhang_id='$mahang'");
  header('Location: http://localhost/bandienmay2/admin/dashboard.php?quanly=donhang');
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `donhang` WHERE ctdonhang_id=$xoa");
   mysqli_query($con,"DELETE FROM `ctdonhang` WHERE ctdonhang_id=$xoa");}


 ?>
<br>
 <div style=" display: flex; width: 100%; justify-content: center;">
       
        <p class="nav-link btcsl" ><a href="?quanly=csl" style="color:#000;"> Đơn hàng chưa sử lý </a><span class="sr-only">(current)</span></p>
      
        <p class="nav-link btdsl" ><a href="?quanly=dsl" style="color:#000;"> Đơn hàng đã sử lý </a><span class="sr-only">(current)</span></p>
     
        <p class="nav-link btht" ><a href="?quanly=ht" style="color:#000;">Đơn hàng đã hoàn thành</a> <span class="sr-only">(current)</span></p>
      
      </div>
<br>
<div  style="margin: unset; margin-right: 0px;padding: 0px 30px; width: 100%; display: flex;justify-content: center;">
  <div class="row">
    <?php
    if(isset($_GET['capnhap']) && isset($_GET['tkh']))  {
      $capnhap=$_GET['capnhap'];
      $tkh=$_GET['tkh'];
      $sql_sp=mysqli_query($con,"SELECT ctdonhang_id,donhang_tinhtrang,khachhang_ten,sanpham_ten,donhang_soluong,sanpham_gia,donhang_ngay,khachhang_email FROM donhang,sanpham,khachhang WHERE donhang.sanpham_id=sanpham.sanpham_id and donhang.khachhang_id=khachhang.khachhang_id and ctdonhang_id='$capnhap'");
      $i=0;
    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-6 xemchitiet">
<?php include_once("xemchitiet.php");  ?>
    </div>
  <?php } else{?>
    <div class="col-md-6">
      <h4>Xem chi tiết đơn hàng</h4>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Tổng tiền</th>
          <th>Ngày đặt</th>
        </tr>
        
      </table>
    </div>
  <?php } ?>
  
    <div class="col-md-6 hoanthanh">
      <h4>Danh sách đơn hàng</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT ctdonhang_id,donhang_tinhtrang,  khachhang_ten,  donhang_ngay FROM donhang, sanpham, khachhang WHERE donhang.sanpham_id = sanpham.sanpham_id AND donhang.khachhang_id = khachhang.khachhang_id
      and donhang_tinhtrang=3 GROUP by ctdonhang_id,khachhang_ten,donhang_ngay,donhang_tinhtrang order by donhang_tinhtrang ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Mã hàng</th>
          <th>Tình trạng đơn</th>
          <th>Tên khách hàng</th>
          <th>Ngày đặt  </th>
        </tr>
        <?php 
        $i=0;
        while($row_loai=mysqli_fetch_array($sql_selct)){
          $i++;
        ?>
        <tr>
          <td>
            <?php echo $i  ?>
          </td>
          <td>
            <?php echo $row_loai['ctdonhang_id']  ?>
          </td>
           <td><?php if($row_loai['donhang_tinhtrang']==1){
            echo 'Chưa sử lý';
           }elseif($row_loai['donhang_tinhtrang']==2){
            echo 'Đã sử lý';
           }
           else{
            echo 'Hoàn thành ';
           } ?></td>
          <td>
            <?php echo $row_loai['khachhang_ten']  ?>
          </td>
          <td>
            <?php echo $row_loai['donhang_ngay']  ?>
          </td>

          <td> 
            <?php if($row_loai['donhang_tinhtrang']==3 || $row_loai['donhang_tinhtrang']==2)  {?>
              <a class="btn btn-success" href="?quanly=ht&capnhap=<?php echo $row_loai["ctdonhang_id"]?>&tkh=<?php echo $row_loai["khachhang_ten"]?>">Xem</a>  
            <?php } else {?>
            <a class="btn btn-success" href="?quanly=donhang&xoa=<?php echo $row_loai["ctdonhang_id"]  ?>">Xóa</a>  
            <a class="btn btn-success" href="?quanly=donhang&capnhap=<?php echo $row_loai["ctdonhang_id"]?>&tkh=<?php echo $row_loai["khachhang_ten"]?>">Xửa</a>  
          <?php } ?>

          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>
<!-- <script>
$(document).ready(function(){
 
  $(".hoanthanh").hide();
  $(".dasuly").hide();
  $(".chuasuly").show();


 

});
</script>
 -->