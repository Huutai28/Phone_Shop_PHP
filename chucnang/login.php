		<?php
			if (isset($_POST['submit_register'])) {
				$ten_kh = $_POST['Username'];
				$mat_khau = $_POST['Password'];
				$email = $_POST['Email'];
				$phone = $_POST['Phone'];

				if (isset($ten_kh)&&isset($mat_khau)&&isset($email)&&isset($phone)) {
					$sql = "INSERT INTO `khachhang`(`ten_kh`, `mat_khau`, `email`, `phone`) VALUES ('$ten_kh','$mat_khau','$email','$phone')";
					$query = mysqli_query($conn, $sql);
				}
			}
			if (isset($_POST['submit_login'])) {
				$ten_kh = $_POST['Username'];
				$mat_khau = $_POST['Password'];

				if (isset($ten_kh)&&isset($mat_khau)) {
					$sql = "SELECT * FROM `khachhang` WHERE ten_kh = '$ten_kh' AND mat_khau = '$mat_khau';";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_num_rows($query);

					if ($row > 0) {
						$_SESSION['ten_kh'] = $ten_kh;
						$_SESSION['mat_khau'] = $mat_khau;
						header('location:index.php');
					}

				}
			}
		?>

		<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login">
			<h3>Đăng nhập & Đăng ký</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>‎Đăng nhập vào tài khoản của bạn‎</h2>
					<form method="post">
					  <input type="text" name="Username" placeholder="Tên đăng nhập" required=" ">
					  <input type="password" name="Password" placeholder="Mật khẩu" required=" ">
					  <input type="submit" value="Đăng nhập" name="submit_login">
					</form>
				  </div>
				  <div class="form">
					<h2>Tạo tài khoản</h2>
					<form method="POST">
					  <input type="text" name="Username" placeholder="Tên đăng nhập" required=" ">
					  <input type="password" name="Password" placeholder="Mật khẩu" required=" ">
					  <input type="email" name="Email" placeholder="Email" required=" ">
					  <input type="text" name="Phone" placeholder="Số điện thoại" required=" ">
					  <input type="submit" value="Đăng ký" name="submit_register">
					</form>
				  </div>
				  <div class="cta"><a href="#">Quên mật khẩu?</a></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- newsletter-top-serv-btm -->
	<div class="newsletter-top-serv-btm">
		<div class="container">
			<div class="col-md-4 wthree_news_top_serv_btm_grid">
				<div class="wthree_news_top_serv_btm_grid_icon">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</div>
				<h3>Nam libero tempore</h3>
				<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus 
					saepe eveniet ut et voluptates repudiandae sint et.</p>
			</div>
			<div class="col-md-4 wthree_news_top_serv_btm_grid">
				<div class="wthree_news_top_serv_btm_grid_icon">
					<i class="fa fa-bar-chart" aria-hidden="true"></i>
				</div>
				<h3>officiis debitis aut rerum</h3>
				<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus 
					saepe eveniet ut et voluptates repudiandae sint et.</p>
			</div>
			<div class="col-md-4 wthree_news_top_serv_btm_grid">
				<div class="wthree_news_top_serv_btm_grid_icon">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div>
				<h3>eveniet ut et voluptates</h3>
				<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus 
					saepe eveniet ut et voluptates repudiandae sint et.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
