       <h4>Xem chi tiết đơn hàng : <?php echo $capnhap ?> - <?php echo $tkh ?></h4>
      <table class="table table-bordered">
        <tr>
          <th>Thứ tự</th>
        
          <th>Tên sản phẩm</th>
          <th>Tố lượng</th>
          <th>Giá</th>
          <th>Tổng tiền</th>
          <th>Ngày đặt</th>
        </tr>
        <?php while($row_sp=mysqli_fetch_array($sql_sp)){ $i=$i+1; 
          $tinhtrang=$row_sp['donhang_tinhtrang'];?>
          <tr>
           <td><?php echo $i ?></td>
           <td><?php echo $row_sp['sanpham_ten'] ?></td>
           <td><?php echo $row_sp['donhang_soluong'] ?></td>
           <td><?php echo $row_sp['sanpham_gia'] ?></td>
           <td><?php echo $row_sp['donhang_soluong']*$row_sp['sanpham_gia']  ?></td>
           <td><?php echo $row_sp['donhang_ngay'] ?></td>
          </tr>
        <?php  } ?>
      </table>
      <?php if($tinhtrang!=3) {?>
      <form action="" method="POST">
      <select class="form-group" name="tinhtrang">
        <option value="2"   <?php if($tinhtrang==2) {echo 'selected'; } ?> >Đã sử lý</option>
        <option value="1" <?php if($tinhtrang==1) {echo 'selected'; } ?> >Chưa sử lý</option>
      </select>
      <input type="hidden" name="mahang" value="<?php echo $capnhap ?>">
      <input type="hidden" name="email" value="<?php echo $row_sp['khachhang_email'] ?>">
      <input type="submit" name="capnhap" value="Cập Nhập" class="btn btn-success">
    </form>
  <?php } ?>