		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner9 w3l_banner_nav_right_banner_pet">
				<h4>Your Pet Favourite Food</h4>
				<p>Sint occaecat cupidatat non proident</p>
				<a href="single.html">Shop Now</a>
			</div>
			<?php
				$stext = $_POST['Product'];
				$stextNew = trim($stext);
				$arr_stextNew = explode(' ', $stextNew);
				$stextNew = implode('%', $arr_stextNew);
				$stextNew = '%'.$stextNew.'%';
?>

			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3 class="w3l_fruit">Kết quả tìm kiếm từ khóa:"<?php echo $stext ?>"</h3>
				<?php
				
				$sql="SELECT * FROM `sanpham` WHERE ten_sp LIKE('$stextNew') ORDER BY id_sp DESC";
				$query = mysqli_query($conn,$sql);
				$check = mysqli_num_rows($query);
				if ($check > 0) {
					while($row = mysqli_fetch_assoc($query)){
			?>
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="index.php?page_layout=productDetails&id=<?php echo $row['id_sp'] ?>"><img src="./upload/<?php echo $row['anh_sp'] ?>" alt=" " class="img-responsive" /></a>
											<p><?php echo $row['ten_sp'] ?></p>
											<h4><?php echo number_format($row['gia_sp'])  ?>đ</h4>
										</div>
										<div class="snipcart-details">
											<form action="index.php?page_layout=checkout&action=add" method="post">
												<input type="hidden" name="quantity[<?php echo $row['id_sp'] ?>]" value="1" />
												<input type="submit" name="submit" value="Add to cart" class="button" />
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					</div>
<?php
}}
?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>