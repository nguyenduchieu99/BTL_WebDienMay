<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
if(isset($_POST['themthuonghieu'])){
  $_SESSION['th']=1;
  $thuonghieu=$_POST['thuonghieu'];
  mysqli_query($con,"INSERT INTO `thuonghieu`(`thuonghieu_id`, `thuonghieu_ten`) VALUES ('','$thuonghieu')");
}
if(isset($_POST['themthuonghieu1'])){
  $_SESSION['th']=2;
  $thuonghieu=$_POST['thuonghieu'];
  mysqli_query($con,"INSERT INTO `thuonghieu`(`thuonghieu_id`, `thuonghieu_ten`,`thuonghieu_pk`) VALUES ('','$thuonghieu',1)");
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `thuonghieu` WHERE thuonghieu_id=$xoa");
 }

 ?>

<br>
 <div style=" display: flex; width: 100%; justify-content: center;">
       
       
      
        <p class="nav-link spdongho" ><a  style="color:#000;">Thương hiệu đồng hồ </a><span class="sr-only">(current)</span></p>
     
        <p class="nav-link spphukien" ><a style="color:#000;">Thương hiêu phụ kiện</a> <span class="sr-only">(current)</span></p>
      
      </div>
<br>
<div class="container dongho">
  <div class="row">
    <?php
    if(isset($_GET['capnhap'])&&isset($_GET['name']))  {
      $_SESSION['th']=1;
      $capnhap=$_GET['capnhap'];
      $name=$_GET['name'];
      if(isset($_POST['capnhapthuonghieu'])){
         $_SESSION['th']=1;
  $thuonghieu=$_POST['thuonghieu'];
  mysqli_query($con,"UPDATE `thuonghieu` SET`thuonghieu_ten`='$thuonghieu' WHERE thuonghieu_id=$capnhap");
  $capnhap='';
 }


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập thương hiệu</h4>
      <label>Tên thương hiệu</label>
      <form action="#" method="post">
        <input type="text" name="thuonghieu" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapthuonghieu" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm thương hiệu</h4>
      <label>Tên thương hiệu</label>
      <form action="" method="post">
        <input required="" type="text" name="thuonghieu" class="form-control" placeholder="tên thương hiệu"><br>
        <input type="submit" name="themthuonghieu" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách thương hiệu</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_pk=0 ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên thương hiệu</th>
          <th>Quản lý</th>
        </tr>
        <?php 
        $i=0;
        while($row_thuonghieu=mysqli_fetch_array($sql_selct)){
          $i++;
        ?>
        <tr>
          <td>
            <?php echo $i  ?>
          </td>
          <td>
            <?php echo $row_thuonghieu['thuonghieu_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=thuonghieu&xoa=<?php echo $row_thuonghieu["thuonghieu_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=thuonghieu&capnhap=<?php echo $row_thuonghieu["thuonghieu_id"]  ?>&name=<?php echo $row_thuonghieu["thuonghieu_ten"]  ?>">Xửa</a>  

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
      $capnhap1=$_GET['capnhap1'];
      $name=$_GET['name'];
      if(isset($_POST['capnhapthuonghieu'])){
        $_SESSION['th']=2; 
  $thuonghieu=$_POST['thuonghieu'];
  mysqli_query($con,"UPDATE `thuonghieu` SET`thuonghieu_ten`='$thuonghieu' WHERE thuonghieu_id=$capnhap1");
  $capnhap1='';
 }


    }else{
      $capnhap1='';
    }
    if($capnhap1){  ?>
      <div class="col-md-4">
      <h4>Cập nhập thương hiệu</h4>
      <label>Tên thương hiệu</label>
      <form action="#" method="post">
        <input type="text" name="thuonghieu" class="form-control" placeholder="<?php echo $name  ?>"><br>
        <input type="submit" name="capnhapthuonghieu" class="btn btn-default" value="Xửa">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm thương hiệu</h4>
      <label>Tên thương hiệu</label>
      <form action="" method="post">
        <input required="" type="text" name="thuonghieu" class="form-control" placeholder="tên thương hiệu"><br>
        <input type="submit" name="themthuonghieu1" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách thương hiệu</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_pk=1 ");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
          <th>Tên thương hiệu</th>
          <th>Quản lý</th>
        </tr>
        <?php 
        $i=0;
        while($row_thuonghieu=mysqli_fetch_array($sql_selct)){
          $i++;
        ?>
        <tr>
          <td>
            <?php echo $i  ?>
          </td>
          <td>
            <?php echo $row_thuonghieu['thuonghieu_ten']  ?>
          </td>
          <td> <a class="btn btn-success" href="?quanly=thuonghieu&xoa=<?php echo $row_thuonghieu["thuonghieu_id"]  ?>">Xóa</a>  
               <a class="btn btn-success" href="?quanly=thuonghieu&capnhap1=<?php echo $row_thuonghieu["thuonghieu_id"]  ?>&name=<?php echo $row_thuonghieu["thuonghieu_ten"]  ?>">Xửa</a>  

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
    $(".spdongho").on("click",function(){
      $(".dongho").show();
      $(".phukien").hide();
    });
    $(".spphukien").on("click",function(){
      $(".dongho").hide();
      $(".phukien").show();
    });


  });
</script>
