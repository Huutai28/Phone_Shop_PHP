

	<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Giỏ<span>Hàng</span></h3>

<?php
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (isset($_GET['action'] )) {

	function update_cart($add = false)
	{
		foreach($_POST['quantity'] as $id_sp => $quantity){
			if ($add) {
				$_SESSION['cart'][$id_sp] += $quantity;
			}else{
				$_SESSION['cart'][$id_sp] = $quantity;
			}
			}
			header('Location:index.php?page_layout=checkout');
			
	}

	switch($_GET['action']){
		case 'add':
			update_cart(true);
			break;
		case 'delete':
			if (isset($_GET['id'])) {
				unset($_SESSION['cart'][$_GET['id']]);
			}
			header('Location:index.php?page_layout=checkout');
			break;
		case 'submit':
		$orderID="";
			if (isset($_POST['update_click'])) {
				update_cart();
				unset($_POST['update_click']);
			}else if (isset($_POST['order_click'])) {
				if (!empty($_POST['quantity'])) {
					$products = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE id_sp IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $total = 0;
                            $orderProducts = array();
                            while ($row = mysqli_fetch_array($products)) {
                                $orderProducts[] = $row;
                                $total += $row['gia_sp'] * $_POST['quantity'][$row['id_sp']];
                            }
					$name = $_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$note = $_POST['note'];
					
					$sql_cart ="INSERT INTO `giohang`(`ho_ten`, `so_dien_thoai`, `email`, `dia_chi`, `ghi_chu`, `tong_cong`) VALUES ('$name','$phone','$email','$address','$note','$total')";
					$query_cart = mysqli_query($conn, $sql_cart);
					$last_id = 0;
					if ($conn->query($sql_cart) === TRUE) {
    					$last_id = $conn->insert_id;
                            $insertString = "";
                            foreach ($orderProducts as $key => $product) {
                                $insertString .= "(NULL, '" . $last_id . "', '" . $product['id_sp'] . "', '" . $_POST['quantity'][$product['id_sp']] . "', '" . $product['gia_sp'] . "')";
                                if ($key != count($orderProducts) - 1) {
                                    $insertString .= ",";
                                }
                            }
                            $sql_chitiet = "INSERT INTO `giohang_chitiet`(`id`, `id_giohang`, `id_sanpham`, `so_luong`, `gia_sp`) VALUES " . $insertString . ";";
                            $query_chitiet = mysqli_query($conn,$sql_chitiet);
                            header('location:index.php');
                            unset($_SESSION['cart']);
					} 
				}
			}
			break;
	}

}
if (!empty($_SESSION['cart'])) {
	$product = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE `id_sp` IN (".implode(",", array_keys($_SESSION['cart'])).")");
	$checkRow = mysqli_num_rows($product);
?>

<form action="index.php?page_layout=checkout&action=submit" method="post" class="creditly-card-form agileinfo_form">
	      <div class="checkout-right">
					<h4>Giỏ của bạn chứa: <span><?php echo $checkRow.' sản phẩm'; ?></span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>STT</th>	
							<th>Sản phẩm</th>
							<th>Tên Sản phẩm</th>
							<th>Số Lượng</th>
							<th>Đơn Giá</th>
							<th>Thành Tiền</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<?php
					$total = 0;
					$num = 1;
					while ($row = mysqli_fetch_array($product)) { ?>
					<tbody>
						<tr class="rem1">
						<td class="invert"><?=$num; ?></td>
						<td class="invert"><a href="index.php?page_layout=productDetails&id=<?php echo $row['id_sp'] ?>"><img width=60 src="./upload/<?php echo $row['anh_sp'] ?>" alt=" " /></a></td>
						<td class="invert"><?php echo $row['ten_sp'] ?></td>
						<td class="invert">
							<input type="number" size="5" name="quantity[<?php echo $row['id_sp'] ?>]" min="1" value="<?=$_SESSION['cart'][$row['id_sp']]?>"/>
						</td>
						
						<td class="invert"><?php echo number_format($row['gia_sp']) ?>đ</td>
						<td class="invert"><?php echo number_format($row['gia_sp'] * $_SESSION['cart'][$row['id_sp']]) ?>đ</td>
						<td class="invert">
							<div class="rem">
								<a href="index.php?page_layout=checkout&action=delete&id=<?php echo $row['id_sp'] ?>"><div class="close1"> </div></a>
							</div>

						</td>
					</tr>

				</tbody>
				<?php
				$total += $row['gia_sp'] * $_SESSION['cart'][$row['id_sp']];
				$num++;
				}
				?>
			</table>

			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<a href='index.php'><h4 >Tiếp tục mua</h4></a>
					<ul>
						<li>Tổng Cộng:      <?php echo number_format($total) ?>đ</li>
						<li><input type="submit" name="update_click" value="Cập Nhật" class="btn btn-primary"/></li>
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Thêm thông tin nhận hàng</h4>
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Họ Tên: </label>
													<input class="billing-address-name form-control" type="text" id="name" name="name" placeholder="Họ Tên...">
												</div>
												<div class="controls">
													<label class="control-label">Số Điện Thoại: </label>
													<input class="billing-address-name form-control" type="text" id="phone" name="phone" placeholder="Số Điện Thoại...">
												</div>
												<div class="controls">
													<label class="control-label">Email: </label>
													<input class="billing-address-name form-control" type="email" id="email" name="email" placeholder="Email...">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Địa Chỉ: </label>
														 <input class="form-control" type="text" placeholder="Địa Chỉ..." id="address" name="address">
														</div>
														<div class="controls">
															<label class="control-label">Ghi Chú: </label>
														 <textarea class="form-control" rows="4" name="note"></textarea>
														</div>
													</div>

													<div class="clear"> </div>
												</div>
													<div class="controls">
															<label class="control-label">Loại Địa Chỉ: </label>
												     <select class="form-control option-w3ls">
														<option>Văn Phòng</option>
														<option>Nhà Riêng</option>
														<option>Thương Mại</option>
													</select>
													</div>
											</div>
											<input type="hidden" name="total" value="<?php echo $total ?>">
											<input type="submit" name="order_click" onclick ="return check_order()"  value="Đặt Hàng" class="btn btn-primary"/>
										</div>
									</section>
								</form>
									<div class="checkout-right-basket">
				        	<a href="payment.html">Thanh Toán <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
			

				<div class="clearfix"> </div>
				
			</div>
<?php
}else{
	echo "<div class='container-fluid mt-100'>
            <div class='card'>
                <div class='card-body cart'>
                    <div class='col-sm-12 empty-cart-cls text-center'> <img src='https://i.imgur.com/dCdflKN.png' width='130' height='130' class='img-fluid mb-4 mr-3'>
                        <h3><strong>Giỏ hàng của bạn trống</strong></h3>
                        <h4 style='margin-Top: 5px;'>Thêm cái gì đó để làm cho tôi hạnh phúc :)</h4> <a href='index.php' style='margin: 15px; background-color: #FA1818; !important;' class='btn btn-primary cart-btn-transform m-3' data-abc='true'>Tiếp tục mua</a>
                    </div>
                </div>
            </div>
        </div>
";
}
?>
		</div>

<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<script type="text/javascript">
	function check_order(){
		var ho_ten = document.getElementById('name').value;
		var so_dien_thoai = document.getElementById('phone').value;
		var email = document.getElementById('email').value;
		var dia_chi = document.getElementById('address').value;
		if (ho_ten == "") {
			alert('Vui lòng nhập họ tên!');
			document.getElementById('name').focus();
			return false;
		}
		if (ho_ten.length <=2) {
			alert('Họ tên quá ngắn!');
			document.getElementById('name').focus();
			return false;
		}
		if (so_dien_thoai == "") {
			alert('Vui lòng nhập số điện thoại!');
			document.getElementById('phone').focus();
			return false;
		}
		if(isNaN(so_dien_thoai)){
			alert('Số điện thoại phải là số!');
			document.getElementById('phone').focus();
			return false;
		}
		if (so_dien_thoai.length <=9 || so_dien_thoai.length >11) {
			alert('Số điện thoại không hợp lệ!');
			document.getElementById('phone').focus();
			return false;
		}
		if (email == "") {
			alert('Vui lòng nhập email!');
			document.getElementById('email').focus();
			return false;
		}
		if (dia_chi == "") {
			alert('Vui lòng nhập địa chỉ!');
			document.getElementById('address').focus();
			return false;
		}
	}
</script>