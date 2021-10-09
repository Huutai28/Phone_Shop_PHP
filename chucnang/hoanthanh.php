<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `giohang` WHERE id = $id;";
    $query = mysqli_query($conn, $sql);
    $row_cart = mysqli_fetch_array($query);

    $ten = $row_cart['ho_ten'];
    $mail = $row_cart['email'];
    $dt = $row_cart['so_dien_thoai'];
    $dc = $row_cart['dia_chi'];

    $product = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE `id_sp` IN (".implode(",", array_keys($_SESSION['cart'])).")");
    

    $strBody = '';
    // Thông tin Khách hàng
    $strBody = '<p>
    <b>Khách hàng:</b> '.$ten.'<br />
    <b>Email:</b> '.$mail.'<br />
    <b>Điện thoại:</b> '.$dt.'<br />
    <b>Địa chỉ:</b> '.$dc.'
    </p>';
    // Danh sách Sản phẩm đã mua
    $strBody .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
    width="100%">
    <tr>
    <td align="center" bgcolor="#3F3F3F" colspan="4"><font
    color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
    </tr>
    <tr id="invoice-bar">
    <td width="45%"><b>Tên Sản phẩm</b></td>
    <td width="20%"><b>Giá</b></td>
    <td width="15%"><b>Số lượng</b></td>
    <td width="20%"><b>Thành tiền</b></td>
    </tr>';
    $total = 0;
    $num = 1;
    while ($row = mysqli_fetch_array($product)) { 
    $num++;
    $strBody .= '<tr>
    <td class="prd-name">'.$row['ten_sp'].'</td>
    <td class="prd-price"><font color="#C40000">'.number_format($row['gia_sp']).'
    VNĐ</font></td>
    <td class="prd-number">'.$_SESSION['cart'][$row['id_sp']].'</td>
    <td class="prd-total"><font color="#C40000">'.number_format($row['gia_sp'] * $_SESSION['cart'][$row['id_sp']]).'
    VNĐ</font></td>
    </tr>';
    $total += $row['gia_sp'] * $_SESSION['cart'][$row['id_sp']];
    }
    $strBody .= '<tr>
    <td class="prd-name">Tổng giá trị hóa đơn là:</td>
    <td colspan="2"></td>
    <td class="prd-total"><b><font color="#C40000">'.number_format($total).'
    VNĐ</font></b></td>
    </tr>
    </table>';
    $strBody .= '<p align="justify">
    <b>Quý khách đã đặt hàng thành công!</b><br />
    • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
    Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
    />
    • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
    khi giao hàng 24 tiếng.<br />
    <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng
    Tôi!</b>
    </p>';
    // Thiết lập cấu hình PHP mailer để gửi Email
    require("class.phpmailer.php"); // nạp thư viện
    $mailer = new PHPMailer(); // khởi tạo đối tượng
    $mailer->IsSMTP(); // gọi class smtp để đăng nhập
    $mailer->CharSet="utf-8"; // bảng mã unicode
    //Đăng nhập Gmail
    $mailer->SMTPAuth = true; // Đăng nhập
    $mailer->SMTPSecure = "ssl"; // Giao thức SSL
    $mailer->Host = "ssl://smtp.gmail.com"; // SMTP của GMAIL
    $mailer->Port = 465; // cổng SMTP
    // Phải chỉnh sửa lại
    $mailer->Username = "nghiemhuutai28@gmail.com"; // GMAIL username
    $mailer->Password = "*01643642917email1"; // GMAIL password
    $mailer->AddAddress($mail, $ten); //email người nhận
    $mailer->AddCC("nghiemhuutai28@gmail.com", "Admin Huu Tai"); // gửi thêm một email cho Admin
    // Chuẩn bị gửi thư nào
    $mailer->FromName = 'Admin Huu Tai'; // tên người gửi
    $mailer->From = 'nghiemhuutai28@gmail.com'; // mail người gửi
    $mailer->Subject = 'Hóa đơn xác nhận mua hàng từ Admin Huu Tai';
    $mailer->IsHTML(TRUE); //Bật HTML không thích thì false
    // Nội dung lá thư
    $mailer->Body = $strBody;
    ?>
            <div class="agileinfo_single">
            	<div class="col-md-8 address_form_agile">

                    	<p style="color: #84C639;" class="ordered-report">Quý khách đã đặt hàng thành công!</p>
                        <p style="color: #84C639;">• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
                        <p style="color: #84C639;">• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
                        <p style="color: #84C639;">• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
                        <p align="center" style="color: #84C639;">Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
                     <div class="agileinfo_single">
                    </h4> <a href='index.php' style='margin-left: 600px; background-color: #FA1818; !important;' class='btn btn-primary cart-btn-transform m-3' data-abc='true'>Quay lại trang chủ</a>
                </div>
                </div>
            </div>
            <div class="clearfix"> </div>
                <?php
    // Gửi email
    if(!$mailer->Send()){
    // Gửi không được, đưa ra thông báo lỗi
    echo "Lỗi gửi Email: " . $mailer->ErrorInfo;
    }
    else{
    // Gửi thành công
    header('location:index.php');
    }
?>