<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
if(isset($_POST['thembomay'])){
  $bomay=$_POST['bomay'];
  mysqli_query($con,"INSERT INTO `bomay`(`bomay_id`, `bomay_ten`) VALUES ('','$bomay')");
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `bomay` WHERE bomay_id=$xoa");
 }

 ?>


<br>
<div class="container">
  <div class="row">
    <?php
    if(isset($_GET['capnhap'])&&isset($_GET['name']))  {
      $capnhap=$_GET['capnhap'];
      $name=$_GET['name'];
      if(isset($_POST['capnhapbomay'])){
  $bomay=$_POST['bomay'];
  mysqli_query($con,"UPDATE `bomay` SET`bomay_ten`='$bomay' WHERE bomay_id=$capnhap");
  header('Location: http://localhost/bandienmay2/admin/dashboard.php?quanly=bomay');

}


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập bộ máy</h4>
      <label>Tên bộ máy</label>
      <form action="" method="post">
        <input type="text" name="bomay" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapbomay" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm bộ máy</h4>
      <label>Tên bộ máy</label>
      <form action="" method="post">
        <input required="" type="text" name="bomay" class="form-control" placeholder="tên bộ máy"><br>
        <input type="submit" name="thembomay" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách bộ máy</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from bomay ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên bộ máy</th>
          <th>Quản lý</th>
        </tr>
        <?php 
        $i=0;
        while($row_bomay=mysqli_fetch_array($sql_selct)){
          $i++;
        ?>
        <tr>
          <td>
            <?php echo $i  ?>
          </td>
          <td>
            <?php echo $row_bomay['bomay_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=bomay&xoa=<?php echo $row_bomay["bomay_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=bomay&capnhap=<?php echo $row_bomay["bomay_id"]  ?>&name=<?php echo $row_bomay["bomay_ten"]  ?>">Xửa</a>  

          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>
