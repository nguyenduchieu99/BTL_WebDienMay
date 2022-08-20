<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0"  style="max-width:18%;">
					<div class="agileits-navi_search">
					
						<form action="#" method="POST" enctype="multipart/form-data" style="padding-left:15px">
							<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">loại</h3>
							
							<div class="left-side py-2">
								<ul>
									<?php 
									$sql_loai=mysqli_query($con,'SELECT * from loai where loai_pk=0 order by loai_id');
									while ($row_loai=mysqli_fetch_array($sql_loai)){
										?>
									
									<li>
										<input type="checkbox" name="loai_l[]" class="checked" value="<?php echo $row_loai['loai_id'] ?>">
										<span class="span"><?php echo $row_loai['loai_ten'] ?></span>
									</li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<!-- ram -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Thương hiệu</h3>
							<ul>
									<?php 
									$sql_loai=mysqli_query($con,'SELECT * from thuonghieu where thuonghieu_pk=0 order by thuonghieu_id');
									while ($row_loai=mysqli_fetch_array($sql_loai)){
										?>
									
									<li>
										<input type="checkbox" name="thuonghieu[]" class="checked" value=<?php echo $row_loai['thuonghieu_id'] ?>">
										<span class="span"><?php echo $row_loai['thuonghieu_ten'] ?></span>
									</li>
								<?php } ?>
								</ul>
						</div>
						<!-- //ram -->
						<!-- price -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Bộ máy</h3>
							<div class="w3l-range">
								<ul>
									<?php 
									$sql_loai=mysqli_query($con,'SELECT * from bomay order by bomay_id');
									while ($row_loai=mysqli_fetch_array($sql_loai)){
										?>
									
									<li>
										<input type="checkbox" name="bomay[]"  class="checked" value="<?php echo $row_loai['bomay_id'] ?>">
										<span class="span"><?php echo $row_loai['bomay_ten'] ?></span>
									</li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Dây</h3>
							<div class="w3l-range">
								<ul>
									<?php 
									$sql_loai=mysqli_query($con,'SELECT * from day order by day_id');
									while ($row_loai=mysqli_fetch_array($sql_loai)){
										?>
									
									<li>
										<input type="checkbox" name="day[]" class="checked" value=<?php echo $row_loai['day_id'] ?>">
										<span class="span"><?php echo $row_loai['day_ten'] ?></span>
									</li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- discounts -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Kích thước mặt số</h3>
							<ul>
									<?php 
									$sql_loai=mysqli_query($con,'SELECT * from size order by size_id');
									while ($row_loai=mysqli_fetch_array($sql_loai)){
										?>
									
									<li>
										<input type="checkbox" name="size[]" class="checked" value="<?php echo $row_loai['size_id'] ?>">
										<span class="span"><?php echo $row_loai['size_ten'] ?></span>
									</li>
								<?php } ?>
								</ul>
						</div>
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá</h3>
							<ul>
									<li>
										<input type="checkbox" name="gia[]" class="checked" value="10000000">
										<span class="span"><10.000.000 đ</span>
									</li>
									<li>
										<input type="checkbox" name="gia[]" class="checked" value="30000000">
										<span class="span"><30.000.000 đ</span>
									</li>
								</ul>
						</div>
						<!-- //discounts -->
						<!-- offers -->
						
						<!-- //arrivals -->
					</div>
								<input type="submit" style="height: 46px;
    margin-left: 2px;
  
    border-radius: 10px;
    color: white;
    background: #0879c9;
    border: unset;" class="btn btn-default" name="loc" value="Lọc">
						</form>
				</div>
				
				</div>
		