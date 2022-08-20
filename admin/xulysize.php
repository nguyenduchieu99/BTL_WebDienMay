<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
if(isset($_POST['themsize'])){
  $size=$_POST['size'];
  mysqli_query($con,"INSERT INTO `size`(`size_id`, `size_ten`) VALUES ('','$size')");
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `size` WHERE size_id=$xoa");
 }

 ?>


<br>
<div class="container">
  <div class="row">
    <?php
    if(isset($_GET['capnhap'])&&isset($_GET['name']))  {
      $capnhap=$_GET['capnhap'];
      $name=$_GET['name'];
      if(isset($_POST['capnhapsize'])){
  $size=$_POST['size'];
  mysqli_query($con,"UPDATE `size` SET`size_ten`='$size' WHERE size_id=$capnhap");
  header('Location: http://localhost/bandienmay2/admin/dashboard.php?quanly=size');

}


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập size</h4>
      <label>Tên size</label>
      <form action="" method="post">
        <input type="text" name="size" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapsize" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm size</h4>
      <label>Tên size</label>
      <form action="" method="post">
        <input required="" type="text" name="size" class="form-control" placeholder="tên size"><br>
        <input type="submit" name="themsize" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách size</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from size ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên size</th>
          <th>Quản lý</th>
        </tr>
        <?php 
        $i=0;
        while($row_size=mysqli_fetch_array($sql_selct)){
          $i++;
        ?>
        <tr>
          <td>
            <?php echo $i  ?>
          </td>
          <td>
            <?php echo $row_size['size_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=size&xoa=<?php echo $row_size["size_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=size&capnhap=<?php echo $row_size["size_id"]  ?>&name=<?php echo $row_size["size_ten"]  ?>">Xửa</a>  

          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>
