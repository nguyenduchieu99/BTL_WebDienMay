<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
if(isset($_POST['themday'])){
  $day=$_POST['day'];
  mysqli_query($con,"INSERT INTO `day`(`day_id`, `day_ten`) VALUES ('','$day')");
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `day` WHERE day_id=$xoa");
 }

 ?>


<br>
<div class="container">
  <div class="row">
    <?php
    if(isset($_GET['capnhap'])&&isset($_GET['name']))  {
      $capnhap=$_GET['capnhap'];
      $name=$_GET['name'];
      if(isset($_POST['capnhapday'])){
  $day=$_POST['day'];
  mysqli_query($con,"UPDATE `day` SET`day_ten`='$day' WHERE day_id=$capnhap");
  header('Location: http://localhost/bandienmay2/admin/dashboard.php?quanly=day');

}


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập loại dây</h4>
      <label>Tên loại dây</label>
      <form action="" method="post">
        <input type="text" name="day" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapday" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm loại dây</h4>
      <label>Tên loại dây</label>
      <form action="" method="post">
        <input required="" type="text" name="day" class="form-control" placeholder="tên loại dây"><br>
        <input type="submit" name="themday" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách loại dây</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from day ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên loại dây</th>
          <th>Quản lý</th>
        </tr>
        <?php 
        $i=0;
        while($row_day=mysqli_fetch_array($sql_selct)){
          $i++;
        ?>
        <tr>
          <td>
            <?php echo $i  ?>
          </td>
          <td>
            <?php echo $row_day['day_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=day&xoa=<?php echo $row_day["day_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=day&capnhap=<?php echo $row_day["day_id"]  ?>&name=<?php echo $row_day["day_ten"]  ?>">Xửa</a>  

          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>
