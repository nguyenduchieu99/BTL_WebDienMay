<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
if(isset($_POST['themdanhmuc'])){
  $_SERVER['th']=1;
  $danhmuc=$_POST['danhmuc'];
  mysqli_query($con,"INSERT INTO `loai`(`loai_id`, `loai_ten`) VALUES ('','$danhmuc')");
}
if(isset($_POST['themdanhmuc1'])){
  $_SESSION['th']=2;
  $danhmuc=$_POST['danhmuc'];
  mysqli_query($con,"INSERT INTO `loai`(`loai_id`, `loai_ten`,`loai_pk`) VALUES ('','$danhmuc',1)");
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `loai` WHERE loai_id=$xoa");
 }

 ?>


<br>
 <div style=" display: flex; width: 100%; justify-content: center;">
       
       
      
        <p class="nav-link spdongho" ><a  style="color:#000;">Loại đồng hồ </a><span class="sr-only">(current)</span></p>
     
        <p class="nav-link spphukien" ><a style="color:#000;">Loại phụ kiện</a> <span class="sr-only">(current)</span></p>
      
      </div>
<br>

<div class="container dongho">
  <div class="row">
    <?php
    if(isset($_GET['capnhap'])&&isset($_GET['name']))  {
      $capnhap=$_GET['capnhap'];
      $_SESSION['th']=1;
      $name=$_GET['name'];
      if(isset($_POST['capnhapdanhmuc'])){
  $danhmuc=$_POST['danhmuc'];
  mysqli_query($con,"UPDATE `loai` SET`loai_ten`='$danhmuc' WHERE loai_id=$capnhap");
 $capnhap='';

 }


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập danh mục</h4>
      <label>Tên danh mục</label>
      <form action="#" method="post">
        <input type="text" name="danhmuc" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapdanhmuc" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm danh mục</h4>
      <label>Tên danh mục</label>
      <form action="" method="post">
        <input required="" type="text" name="danhmuc" class="form-control" placeholder="tên danh mục"><br>
        <input type="submit" name="themdanhmuc" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách danh mục</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from loai where loai_pk=0 ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên danh mục</th>
          <th>Quản lý</th>
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
            <?php echo $row_loai['loai_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=danhmuc&xoa=<?php echo $row_loai["loai_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=danhmuc&capnhap=<?php echo $row_loai["loai_id"]  ?>&name=<?php echo $row_loai["loai_ten"]  ?>">Xửa</a>  

          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>

<div class="container phukien">
  <div class="row">
    <?php
    if(isset($_GET['capnhap1'])&&isset($_GET['name']))  {
      $_SESSION['th']=2;
      $capnhap=$_GET['capnhap1'];
      $name=$_GET['name'];
      if(isset($_POST['capnhapdanhmuc'])){
  $danhmuc=$_POST['danhmuc'];
  mysqli_query($con,"UPDATE `loai` SET`loai_ten`='$danhmuc' WHERE loai_id=$capnhap");
 $capnhap='';
 }


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập danh mục</h4>
      <label>Tên danh mục</label>
      <form action="#" method="post">
        <input type="text" name="danhmuc" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapdanhmuc" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm danh mục</h4>
      <label>Tên danh mục</label>
      <form action="" method="post">
        <input required="" type="text" name="danhmuc" class="form-control" placeholder="tên danh mục"><br>
        <input type="submit" name="themdanhmuc1" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách danh mục</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from loai WHERE loai_pk=1 ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên danh mục</th>
          <th>Quản lý</th>
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
            <?php echo $row_loai['loai_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=danhmuc&xoa=<?php echo $row_loai["loai_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=danhmuc&capnhap1=<?php echo $row_loai["loai_id"]  ?>&name=<?php echo $row_loai["loai_ten"]  ?>">Xửa</a>  

          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>
 <?php if($_SESSION['th']==2) {?>
  <script type="text/javascript">
      $(".dongho").hide();
      $(".phukien").show();
      </script>
    <?php }if($_SESSION['th']==1){ ?>
      <script type="text/javascript">
    $(".dongho").show();
    $(".phukien").hide();
    </script>
  <?php } ?>
<script type="text/javascript">

  $(document).ready(function(){
   
    $(".spdongho").click(function(){
      $(".dongho").show();
      $(".phukien").hide();
    });
    $(".spphukien").click(function(){
      $(".dongho").hide();
      $(".phukien").show();
    });


  });
</script>

