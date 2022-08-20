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

  <div style="width: 85%;padding: 20px;">
  	<div id="bieudo" style="width: 100%;height: 500px;text-align: center;align-content: center;">
  		
  	</div>
     <?php 
            $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
            echo "<h6 style='color:#000;line-height: 26px;'>   Tổng tiền:".currency_format($row['tien'])." <br>  Số sản phẩm:".$row['sl']." <br>  Số đơn:".$row['dh']."</h6>";
             ?>
  </div>


</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Thứ', 'Tiền(triệu)', 'Số sản phẩm', 'số đơn'],
          // ['2014', 1000, 400, 200],
          // ['2015', 1170, 460, 250],
          // ['2016', 660, 1120, 300],
          // ['2017', 1030, 540, 350]
          <?php 
          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=2 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['2',0,0,0],";
          }else{
            echo " ['2',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }

          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=3 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['3',0,0,0],";
          }else{
            echo " ['3',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }

          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=4 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['4',0,0,0],";
          }else{
            echo " ['4',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }
          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=5 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['5',0,0,0],";
          }else{
            echo " ['5',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }
          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=6 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['6',0,0,0],";
          }else{
            echo " ['6',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }
          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=7 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['7',0,0,0],";
          }else{
            echo " ['7',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }
          $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and Dayofweek(donhang_ngay)=1 AND WEEKOFYEAR(donhang_ngay)=WEEKOFYEAR(CURRENT_DATE);"));
          if($row['tien']==0){
            echo " ['cn',0,0,0],";
          }else{
            echo " ['cn',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
          }
          
           ?>
        ]);

        var options = {
          chart: {
           
           title: 'Doanh thu tuần này ',
            subtitle: '',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('bieudo'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
   