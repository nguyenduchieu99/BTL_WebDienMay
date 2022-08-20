<?php 

if(!isset($_SESSION['admin'])){
	header('Location: index.php');}
if(isset($_POST['themdanhmuc'])){
  $_SESSION['th']=1;
  $danhmuc=$_POST['danhmuc'];
  $th=$_POST['th'];
  $ten=$_POST['ten'];
  $gia=$_POST['gia'];
  $giakm=$_POST['giakm'];
  $soluong=$_POST['soluong'];
  $mota=$_POST['mota'];
  $bomay=$_POST['bomay'];
  $day=$_POST['day'];
  $size=$_POST['size'];
  $anh=$_FILES['anh']['name'];
  $anh_tmp=$_FILES['anh']['tmp_name'];
  $anh2=$_FILES['anh2']['name'];
  $anh2_tmp=$_FILES['anh2']['tmp_name'];
  $anh3=$_FILES['anh3']['name'];
  $anh3_tmp=$_FILES['anh3']['tmp_name'];
  
    mysqli_query($con,"INSERT INTO `sanpham`(`sanpham_ten`, `sanpham_id`, `loai_id`, `sanpham_gia`, `sanpham_km`, `sanpham_soluong`, `sanpham_img`,`sanpham_img2`,`sanpham_img3`, `sanpham_mota`, `thuonghieu_id`, `bomay_id`, `day_id`, `size_id`) VALUES ('$ten','','$danhmuc','$gia','$giakm','$soluong','$anh','$anh2','$anh3','$mota','$th','$bomay','$day','$size')");
  move_uploaded_file($anh_tmp,'../images/'.$anh);
  move_uploaded_file($anh2_tmp,'../images/'.$anh2);
  move_uploaded_file($anh3_tmp,'../images/'.$anh3);
  
 
}
if(isset($_POST['themdanhmuc1'])){
  $_SESSION['th']=2;
  $danhmuc=$_POST['danhmuc'];
  $th=$_POST['th'];
  $ten=$_POST['ten'];
  $gia=$_POST['gia'];
  $giakm=$_POST['giakm'];
  $soluong=$_POST['soluong'];
  $mota=$_POST['mota'];
  $anh=$_FILES['anh']['name'];
  $anh_tmp=$_FILES['anh']['tmp_name'];
  $anh2=$_FILES['anh2']['name'];
  $anh2_tmp=$_FILES['anh2']['tmp_name'];
  $anh3=$_FILES['anh3']['name'];
  $anh3_tmp=$_FILES['anh3']['tmp_name'];
  
    mysqli_query($con,"INSERT INTO `sanpham`(`sanpham_ten`, `sanpham_id`, `loai_id`, `sanpham_gia`, `sanpham_km`, `sanpham_soluong`, `sanpham_img`,`sanpham_img2`,`sanpham_img3`, `sanpham_mota`, `thuonghieu_id`,`sanpham_pk`) VALUES ('$ten','','$danhmuc','$gia','$giakm','$soluong','$anh','$anh2','$anh3','$mota','$th',1)");
  move_uploaded_file($anh_tmp,'../images/'.$anh);
  move_uploaded_file($anh2_tmp,'../images/'.$anh2);
  move_uploaded_file($anh3_tmp,'../images/'.$anh3);
  
 
}
if(isset($_POST['capnhap'])){
  $_SERVER['th']=1;
  $id=$_POST['id_update'];
  $row=mysqli_fetch_array(mysqli_query($con,"SELECT * from sanpham where sanpham_id = '$id'"));
  $danhmuc=$_POST['danhmuc'];
  $th=$_POST['th'];
  $ten=$_POST['ten'];
  $gia=$_POST['gia'];
  $giakm=$_POST['giakm'];
  $soluong=$_POST['soluong'];
  $mota=$_POST['mota'];
  $bomay=$_POST['bomay'];
  $day=$_POST['day'];
  $size=$_POST['size'];
  if(empty($_FILES['anh']['name'])){
    $anh=$row['sanpham_img'];
  }else{$anh=$_FILES['anh']['name'];
  $anh_tmp=$_FILES['anh']['tmp_name'];}

  if(empty($_FILES['anh2']['name'])){
    $anh2=$row['sanpham_img2'];
  }else{$anh2=$_FILES['anh2']['name'];
  $anh2_tmp=$_FILES['anh2']['tmp_name'];}

  if(empty($_FILES['anh3']['name'])){
    $anh3=$row['sanpham_img3'];
  }else{$anh3=$_FILES['anh3']['name'];
  $anh3_tmp=$_FILES['anh3']['tmp_name'];}

    mysqli_query($con,"UPDATE `sanpham` SET `sanpham_ten`='$ten',`loai_id`='$danhmuc',`thuonghieu_id`='$th',`sanpham_gia`='$gia',`sanpham_km`='$giakm',`sanpham_soluong`='$soluong',`sanpham_img`='$anh',`sanpham_img2`='$anh2',`sanpham_img3`='$anh3',`sanpham_mota`='$mota',`bomay_id`='$bomay',`day_id`='$day',`size_id`='$size' WHERE sanpham_id='$id'");
    if(isset($anh_tmp)){
       move_uploaded_file($anh_tmp,'../images/'.$anh);
    }
 if(isset($anh2_tmp)){
  move_uploaded_file($anh2_tmp,'../images/'.$anh2);
 }
  if(isset($anh3_tmp)){
      move_uploaded_file($anh3_tmp,'../images/'.$anh3);

  }
  
  header('Location: http://localhost/bandienmay2/admin/dashboard.php?quanly=sanpham');
}
if(isset($_POST['capnhap1'])){
  $_SESSION['th']=2;
  $id=$_POST['id_update'];
  $row=mysqli_fetch_array(mysqli_query($con,"SELECT * from sanpham where sanpham_id = '$id'"));
  $danhmuc=$_POST['danhmuc'];
  $th=$_POST['th'];
  $ten=$_POST['ten'];
  $gia=$_POST['gia'];
  $giakm=$_POST['giakm'];
  $soluong=$_POST['soluong'];
  $mota=$_POST['mota'];
  if(empty($_FILES['anh']['name'])){
    $anh=$row['sanpham_img'];
  }else{$anh=$_FILES['anh']['name'];
  $anh_tmp=$_FILES['anh']['tmp_name'];}

  if(empty($_FILES['anh2']['name'])){
    $anh2=$row['sanpham_img2'];
  }else{$anh2=$_FILES['anh2']['name'];
  $anh2_tmp=$_FILES['anh2']['tmp_name'];}

  if(empty($_FILES['anh3']['name'])){
    $anh3=$row['sanpham_img3'];
  }else{$anh3=$_FILES['anh3']['name'];
  $anh3_tmp=$_FILES['anh3']['tmp_name'];}

    mysqli_query($con,"UPDATE `sanpham` SET `sanpham_ten`='$ten',`loai_id`='$danhmuc',`thuonghieu_id`='$th',`sanpham_gia`='$gia',`sanpham_km`='$giakm',`sanpham_soluong`='$soluong',`sanpham_img`='$anh',`sanpham_img2`='$anh2',`sanpham_img3`='$anh3',`sanpham_mota`='$mota' WHERE sanpham_id='$id'");
    if(isset($anh_tmp)){
       move_uploaded_file($anh_tmp,'../images/'.$anh);
    }
 if(isset($anh2_tmp)){
  move_uploaded_file($anh2_tmp,'../images/'.$anh2);
 }
  if(isset($anh3_tmp)){
      move_uploaded_file($anh3_tmp,'../images/'.$anh3);

  }
  
  header('Location: http://localhost/bandienmay2/admin/dashboard.php?quanly=sanpham');
}
if(isset($_GET['xoa'])){
  $xoa=$_GET['xoa'];
  mysqli_query($con,"DELETE FROM `sanpham` WHERE sanpham_id=$xoa");}


 ?>

<br>
 <div style=" display: flex; width: 100%; justify-content: center;">
       
       
      
        <p class="nav-link spdongho" ><a  style="color:#000;"> Đồng hồ </a><span class="sr-only">(current)</span></p>
     
        <p class="nav-link spphukien" ><a style="color:#000;">phụ kiện</a> <span class="sr-only">(current)</span></p>
      
      </div>
<br>

<div class="dongho" style="margin: unset; margin-right: 0px;padding: 0px 30px; width: 100%; display: flex;justify-content: center;">
  <div class="row">
    <?php
    if(isset($_GET['capnhap']))  {
      $capnhap=$_GET['capnhap'];
      $_SESSION['th']=1;
      $sql_sp=mysqli_query($con,"SELECT * FROM `sanpham` WHERE sanpham_id=$capnhap");
      $row_sp=mysqli_fetch_array($sql_sp);
      $loai=$row_sp['loai_id'];
      $bomay=$row_sp['bomay_id'];$day=$row_sp['day_id'];$size=$row_sp['size_id'];
      $thieu=$row_sp['thuonghieu_id'];


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập sản phẩm</h4>
      
      <form action="" method="POST" enctype="multipart/form-data">
        <label>Tên sản phẩm</label>
        <input type="hidden" name="id_update" class="form-control" value="<?php echo $row_sp['sanpham_id']  ?>">
        <input type="text" name="ten" class="form-control" value="<?php echo $row_sp['sanpham_ten']  ?>"><br>
        <label>Danh mục</label>
        <select name="danhmuc" class="form-control">
          <option>Chọn danh mục</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from loai where loai_pk=0");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($loai==$row_danhmuc['loai_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['loai_id'] ?>"><?php echo $row_danhmuc['loai_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['loai_id'] ?>"><?php echo $row_danhmuc['loai_ten'] ?></option>
        <?php } }?>
        </select><br>
         <label>Thương hiệu</label>
        <select name="th" class="form-control">
          <option value="">Thương hiệu</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_pk=0");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($thieu==$row_danhmuc['thuonghieu_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['thuonghieu_id'] ?>"><?php echo $row_danhmuc['thuonghieu_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['thuonghieu_id'] ?>"><?php echo $row_danhmuc['thuonghieu_ten']  ?></option>
        <?php } }?>
        </select><br>
        <label>Bộ máy</label>
        <select name="bomay" class="form-control">
          <option>Chọn bộ máy</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from bomay");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($bomay==$row_danhmuc['bomay_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['bomay_id'] ?>"><?php echo $row_danhmuc['bomay_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['bomay_id'] ?>"><?php echo $row_danhmuc['bomay_ten'] ?></option>
        <?php } }?>
        </select><br>
        <label>Loại dây</label>
        <select name="day" class="form-control">
          <option>Chọn loại dây</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from day");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($day==$row_danhmuc['day_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['day_id'] ?>"><?php echo $row_danhmuc['day_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['day_id'] ?>"><?php echo $row_danhmuc['day_ten'] ?></option>
        <?php } }?>
        </select><br>
        <label>Size</label>
        <select name="size" class="form-control">
          <option>Chọn size</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from size");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($size==$row_danhmuc['size_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['size_id'] ?>"><?php echo $row_danhmuc['size_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['size_id'] ?>"><?php echo $row_danhmuc['size_ten'] ?></option>
        <?php } }?>
        </select><br>
         <label>Giá sản phẩm</label>
        <input type="number" name="gia" class="form-control" value="<?php echo $row_sp['sanpham_gia']  ?>"><br>
         <label>Giá khuyến mãi</label>
        <input type="number" name="giakm" class="form-control" value="<?php echo $row_sp['sanpham_km']  ?>"><br>
         <label>Số lượng</label>
        <input type="number" name="soluong" class="form-control" value="<?php echo $row_sp['sanpham_soluong']  ?>"><br>
         <label>Ảnh</label>
        <input type="file" name="anh" class="form-control" value="<?php echo $row_sp['sanpham_img'] ?>"><br>
        <label>Ảnh 2</label>
        <input type="file" name="anh2" class="form-control" value="<?php echo $row_sp['sanpham_img2'] ?>""><br>
        <label>Ảnh 3</label>
        <input type="file" name="anh3" class="form-control" value="<?php echo $row_sp['sanpham_img3'] ?>""><br>
         <label>Mô tả</label>
        <input type="text" name="mota" class="form-control" value="<?php echo $row_sp['sanpham_mota']  ?>"><br>
        <input type="submit" name="capnhap" class="btn btn-default" value="Cập nhập">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm sản phẩm</h4>
      
      <form action="" method="post" enctype="multipart/form-data">
        <label>Tên sản phẩm</label>
        <input required="" type="text" name="ten" class="form-control" placeholder="tên sản phẩm"><br>
        <label>Danh mục</label>
        <select name="danhmuc" class="form-control">
          <option value="">Chọn danh mục</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from loai where loai_pk=0");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['loai_id'] ?>"><?php echo $row_danhmuc['loai_ten'] ?></option>
        <?php } ?>
        </select><br>
        <label>Thương hiệu</label>
        <select name="th" class="form-control">
          <option value="" >Chọn thương hiệu</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_pk=0");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['thuonghieu_id'] ?>"><?php echo $row_danhmuc['thuonghieu_ten'] ?></option>
        <?php } ?>
        </select><br>
        <label>Bộ máy</label>
        <select name="bomay" class="form-control">
          <option value="">Chọn bộ máy</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from bomay");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['bomay_id'] ?>"><?php echo $row_danhmuc['bomay_ten'] ?></option>
        <?php } ?>
        </select><br>
        <label>Loại dây</label>
        <select name="day" class="form-control">
          <option value="">Chọn loại dây</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from day");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['day_id'] ?>"><?php echo $row_danhmuc['day_ten'] ?></option>
        <?php } ?>
        </select><br>
        <label>Size</label>
        <select name="size" class="form-control">
          <option value="">Chọn size</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from size");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['size_id'] ?>"><?php echo $row_danhmuc['size_ten'] ?></option>
        <?php } ?>
        </select><br>
         <label>Giá san phẩm</label>
        <input min="1" required="" type="number" name="gia" class="form-control" placeholder=""><br>
         <label>Giá khuyến mãi</label>
        <input type="number" name="giakm" class="form-control" placeholder=""><br>
         <label>Số lượng</label>
        <input min="1" required="" type="number" name="soluong" class="form-control" placeholder=""><br>
         <label>Ảnh</label>
        <input required="" type="file" name="anh" class="form-control" value=""><br>
        <label>Ảnh 2</label>
        <input type="file" name="anh2" class="form-control" value=""><br>
        <label>Ảnh 3</label>
        <input type="file" name="anh3" class="form-control" value=""><br>
         <label>Mô tả</label>
        <input type="text" name="mota" class="form-control" placeholder=""><br>
        <input type="submit" name="themdanhmuc" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách sản phẩm</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from sanpham where sanpham_pk=0 order by sanpham_id");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>TT</th>
          <th>Tên </th>
          <th>Loại</th>
          <th>Thương hiệu</th>
          <th>Số lượng </th>
          <th>Hình ảnh </th>
          <th>Giá  </th>
          <th>Giá km</th>
          <th colspan="2">Quản lý</th>
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
            <?php echo $row_loai['sanpham_ten']  ?>
          </td>
          <td>
            <?php 
            $loai = $row_loai['loai_id'] ;
            $row_tl=mysqli_fetch_array(mysqli_query($con,"SELECT loai_ten from loai where loai_id = '$loai' limit 1"));
            $ktm=mysqli_num_rows(mysqli_query($con,"SELECT loai_ten from loai where loai_id = '$loai' limit 1"));
            if($ktm==1){
               echo $row_tl['loai_ten'];
            }else{
              echo '';
            }
           ?>
          </td>
          <td>
            <?php 
            $loai = $row_loai['thuonghieu_id'] ;
            $row_tl=mysqli_fetch_array(mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_id = '$loai' limit 1"));
            $ktm=mysqli_num_rows(mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_id = '$loai' limit 1"));
            if($ktm==1){
               echo $row_tl['thuonghieu_ten'];
            }else{
              echo '';
            }
           ?>
          </td>
          <td>
            <?php echo $row_loai['sanpham_soluong']  ?>
          </td>
          <td>
            <img width="50" height="50" src="../images/<?php echo $row_loai['sanpham_img'] ?>">
          </td>
          <td>
            <?php echo $row_loai['sanpham_gia']  ?>
          </td>
          <td>
            <?php echo $row_loai['sanpham_km']  ?>
          </td>

          <td> 

            <a class="btn btn-success" href="?quanly=sanpham&xoa=<?php echo $row_loai["sanpham_id"]  ?>">xóa</a>  
            

          </td>
          <td>
            <a class="btn btn-success" href="?quanly=sanpham&capnhap=<?php echo $row_loai["sanpham_id"]?>">xửa</a>  
          </td>
          

        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
</div>

<div class="phukien" style="margin: unset; margin-right: 0px;padding: 0px 30px; width: 100%; display: flex;justify-content: center;">
  <div class="row">
    <?php
    if(isset($_GET['capnhap1']))  {
      $_SESSION['th']=2;
      $capnhap=$_GET['capnhap1'];
      $sql_sp=mysqli_query($con,"SELECT * FROM `sanpham` WHERE sanpham_id=$capnhap");
      $row_sp=mysqli_fetch_array($sql_sp);
      $loai=$row_sp['loai_id'];
      $bomay=$row_sp['bomay_id'];$day=$row_sp['day_id'];$size=$row_sp['size_id'];
      $thieu=$row_sp['thuonghieu_id'];


    }else{
      $capnhap='';
    }
    if($capnhap){  ?>
      <div class="col-md-4">
      <h4>Cập nhập sản phẩm</h4>
      
      <form action="" method="POST" enctype="multipart/form-data">
        <label>Tên sản phẩm</label>
        <input type="hidden" name="id_update" class="form-control" value="<?php echo $row_sp['sanpham_id']  ?>">
        <input type="text" name="ten" class="form-control" value="<?php echo $row_sp['sanpham_ten']  ?>"><br>
        <label>Danh mục</label>
        <select name="danhmuc" class="form-control">
          <option>Chọn danh mục</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from loai where loai_pk=1");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($loai==$row_danhmuc['loai_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['loai_id'] ?>"><?php echo $row_danhmuc['loai_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['loai_id'] ?>"><?php echo $row_danhmuc['loai_ten'] ?></option>
        <?php } }?>
        </select><br>
         <label>Thương hiệu</label>
        <select name="th" class="form-control">
          <option value="">Thương hiệu</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_pk=1");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
            if($thieu==$row_danhmuc['thuonghieu_id']){
          ?>
          <option selected value="<?php echo $row_danhmuc['thuonghieu_id'] ?>"><?php echo $row_danhmuc['thuonghieu_ten'] ?></option>
        <?php } else {?>
          <option value="<?php echo $row_danhmuc['thuonghieu_id'] ?>"><?php echo $row_danhmuc['thuonghieu_ten']  ?></option>
        <?php } }?>
        </select><br>
        
         <label>Giá sản phẩm</label>
        <input type="number" name="gia" class="form-control" value="<?php echo $row_sp['sanpham_gia']  ?>"><br>
         <label>Giá khuyến mãi</label>
        <input type="number" name="giakm" class="form-control" value="<?php echo $row_sp['sanpham_km']  ?>"><br>
         <label>Số lượng</label>
        <input type="number" name="soluong" class="form-control" value="<?php echo $row_sp['sanpham_soluong']  ?>"><br>
         <label>Ảnh</label>
        <input type="file" name="anh" class="form-control" value="<?php echo $row_sp['sanpham_img'] ?>"><br>
        <label>Ảnh 2</label>
        <input type="file" name="anh2" class="form-control" value="<?php echo $row_sp['sanpham_img2'] ?>""><br>
        <label>Ảnh 3</label>
        <input type="file" name="anh3" class="form-control" value="<?php echo $row_sp['sanpham_img3'] ?>""><br>
         <label>Mô tả</label>
        <input type="text" name="mota" class="form-control" value="<?php echo $row_sp['sanpham_mota']  ?>"><br>
        <input type="submit" name="capnhap1" class="btn btn-default" value="Cập nhập">
      </form>
    </div> 
     <?php }else{
    ?>
    <div class="col-md-4">
      <h4>Thêm phụ kiên</h4>
      
      <form action="" method="post" enctype="multipart/form-data">
        <label>Tên sản phẩm</label>
        <input required="" type="text" name="ten" class="form-control" placeholder="tên sản phẩm"><br>
        <label>Danh mục</label>
        <select name="danhmuc" class="form-control">
          <option value="">Chọn danh mục</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from loai where loai_pk=1");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['loai_id'] ?>"><?php echo $row_danhmuc['loai_ten'] ?></option>
        <?php } ?>
        </select><br>
        <label>Thương hiệu</label>
        <select name="th" class="form-control">
          <option value="" >Chọn thương hiệu</option>
          <?php  
          $select_danhmuc=mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_pk=1");
          while($row_danhmuc=mysqli_fetch_array($select_danhmuc)){
          ?>
          <option value="<?php echo $row_danhmuc['thuonghieu_id'] ?>"><?php echo $row_danhmuc['thuonghieu_ten'] ?></option>
        <?php } ?>
        </select><br>
        
        </select><br>
         <label>Giá sản phẩm</label>
        <input min="1" required="" type="number" name="gia" class="form-control" placeholder=""><br>
         <label>Giá khuyến mãi</label>
        <input type="number" name="giakm" class="form-control" placeholder=""><br>
         <label>Số lượng</label>
        <input min="1" required="" type="number" name="soluong" class="form-control" placeholder=""><br>
         <label>Ảnh</label>
        <input required="" type="file" name="anh" class="form-control" value=""><br>
        <label>Ảnh 2</label>
        <input type="file" name="anh2" class="form-control" value=""><br>
        <label>Ảnh 3</label>
        <input type="file" name="anh3" class="form-control" value=""><br>
         <label>Mô tả</label>
        <input type="text" name="mota" class="form-control" placeholder=""><br>
        <input type="submit" name="themdanhmuc1" class="btn btn-default" value="Thêm">
      </form>
    </div> 
  <?php } ?>
    <div class="col-md-8">
      <h4>Danh sách phụ kiện</h4>
      <?php
      $sql_selct=mysqli_query($con,"SELECT * from sanpham where sanpham_pk=1 order by sanpham_id");
      ?>
      <table class="table table-bordered">
        <tr>
          <th>TT</th>
          <th>Tên </th>
          <th>Loại</th>
          <th>Thương hiệu</th>
          <th>Số lượng </th>
          <th>Hình ảnh </th>
          <th>Giá  </th>
          <th>Giá km</th>
          <th colspan="2">Quản lý</th>
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
            <?php echo $row_loai['sanpham_ten']  ?>
          </td>
          <td>
            <?php 
            $loai = $row_loai['loai_id'] ;
            $row_tl=mysqli_fetch_array(mysqli_query($con,"SELECT loai_ten from loai where loai_id = '$loai' limit 1"));
            $ktm=mysqli_num_rows(mysqli_query($con,"SELECT loai_ten from loai where loai_id = '$loai' limit 1"));
            if($ktm==1){
               echo $row_tl['loai_ten'];
            }else{
              echo '';
            }
           ?>
          </td>
          <td>
            <?php 
            $loai = $row_loai['thuonghieu_id'] ;
            $row_tl=mysqli_fetch_array(mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_id = '$loai' limit 1"));
            $ktm=mysqli_num_rows(mysqli_query($con,"SELECT * from thuonghieu where thuonghieu_id = '$loai' limit 1"));
            if($ktm==1){
               echo $row_tl['thuonghieu_ten'];
            }else{
              echo '';
            }
           ?>
          </td>
          <td>
            <?php echo $row_loai['sanpham_soluong']  ?>
          </td>
          <td>
            <img width="50" height="50" src="../images/<?php echo $row_loai['sanpham_img'] ?>">
          </td>
          <td>
            <?php echo $row_loai['sanpham_gia']  ?>
          </td>
          <td>
            <?php echo $row_loai['sanpham_km']  ?>
          </td>

          <td> 

            <a class="btn btn-success" href="?quanly=sanpham&xoa=<?php echo $row_loai["sanpham_id"]  ?>">xóa</a>  
            

          </td>
          <td>
            <a class="btn btn-success" href="?quanly=sanpham&capnhap1=<?php echo $row_loai["sanpham_id"]?>">xửa</a>  
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
