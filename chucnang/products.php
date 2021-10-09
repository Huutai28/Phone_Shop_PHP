		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner9 w3l_banner_nav_right_banner_pet">
				<h4>Your Pet Favourite Food</h4>
				<p>Sint occaecat cupidatat non proident</p>
				<a href="single.html">Shop Now</a>
			</div>
			<?php
				$idDm = $_GET['id'];

				$sqlDm ="SELECT `name_dm` FROM `dmsanpham` WHERE id_dm = $idDm";
				$queryDm = mysqli_query($conn,$sqlDm);
				$checkDm = mysqli_num_rows($queryDm);
				if ($checkDm > 0) {
					$row = mysqli_fetch_assoc($queryDm)
			?>
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3 class="w3l_fruit"><?php echo $row['name_dm']?></h3>
			<?php
				}
			?>
			<?php
				if (isset($_GET['page'])) {
				  $page = $_GET['page'];
				}else{
				  $page = 1;
				}
				$rowPerPage = 16;
				$perRow = $page * $rowPerPage - $rowPerPage;

				$sqlSp="SELECT * FROM `sanpham` WHERE id_dm = $idDm LIMIT $perRow,$rowPerPage;";
				$querySp = mysqli_query($conn,$sqlSp);
				$checkSp = mysqli_num_rows($querySp);
				if ($checkSp > 0) {
					while($row = mysqli_fetch_assoc($querySp)){
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
				<?php
      $totalRow = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `sanpham` WHERE id_dm = $idDm"));
      $totalPage = ceil($totalRow/$rowPerPage);

      $listPage ="";
      $prePage ="";
      $lastPage ="";
      for ($i=1; $i <= $totalPage; $i++) { 
        if ($page == $i) {
          $listPage.='<li class="page-item active"><a class="page-link" href="index.php?page_layout=products&id='.$idDm.'&page='.$i.'">'.$i.'</a></li>';
        }else{
          $listPage.='<li class="page-item"><a class="page-link" href="index.php?page_layout=products&id='.$idDm.'&page='.$i.'">'.$i.'</a></li>';
        }
      }

      $pre = $page - 1;
      $last = $page + 1;
      if ($page == 1) {
        $prePage.='<li class="page-item disabled"><a class="page-link">«</a></li>';
      }else{
        $prePage.='<li class="page-item"><a class="page-link" href="index.php?page_layout=products&id='.$idDm.'&page='.$pre.'">«</a></li>';
      }
      if ($totalPage == $page) {
        $lastPage.='<li class="page-item disabled"><a class="page-link">»</a></li>';
      }else{
        $lastPage.='<li class="page-item"><a class="page-link" href="index.php?page_layout=products&id='.$idDm.'&page='.$last.'">»</a></li>';
      }
    ?>
					<div class="clearfix"> </div>
<div style="padding-left: 950px;">
  <ul class="pagination">
    <?php
      echo $prePage;
      echo $listPage;
      echo $lastPage;
    ?>
  </ul>
</div>
				</div>

			</div>
		</div>
		<div class="clearfix"></div>
	</div>