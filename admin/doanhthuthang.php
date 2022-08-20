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
            $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id AND MONTH(donhang_ngay)=MONTH(CURRENT_DATE);"));
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
          ['Ngày', 'Tiền(triệu)', 'Số sản phẩm', 'số đơn'],
          // ['2014', 1000, 400, 200],
          // ['2015', 1170, 460, 250],
          // ['2016', 660, 1120, 300],
          // ['2017', 1030, 540, 350]
          <?php
          $select= mysqli_query($con,"select a.Date day from (select @lastDay - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c cross join (select @firstDay:=LAST_DAY(curdate() - interval 1 month) + interval 1 day,@lastDay:=last_day(curdate())) var) a where a.Date between @firstDay and @lastDay order by a.Date;");
          while($ngay=mysqli_fetch_array($select)){
            $row=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(DISTINCT ctdonhang_id) dh,SUM(donhang_soluong) sl,SUM(donhang_soluong*sanpham_gia) tien FROM donhang,sanpham WHERE sanpham.sanpham_id=donhang.sanpham_id and DATE(donhang_ngay)='".$ngay['day']."';"));
           if($row['dh']==0){
            echo " ['".$ngay['day']."',0,0,0],";
           }else{
            echo " ['".$ngay['day']."',".($row['tien']/1000000).", ".$row['sl'].", ".$row['dh']."],";
           }
          }

           ?>
        ]);

        var options = {
          chart: {
           
           title: 'Doanh thu tháng ',
            subtitle: '',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('bieudo'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
   