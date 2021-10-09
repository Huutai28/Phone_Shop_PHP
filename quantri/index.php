<?php
ob_start();
session_start();
include_once './ketnoi.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (isset($email) && isset($password)) {
    $sql = "SELECT * FROM `thanhvien` WHERE email = '$email' AND mat_khau = '$password';";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);

    if ($row > 0) {
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      header('location:quantri.php');
    }else{
      
    }
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box">
        <?php
        if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
        ?>
        <form class="login-form" method="POST" onsubmit="return checkform()" name="form1">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i> Đang nhập</h3>
          <div class="form-group">
            <label class="control-label">E-mail</label>
            <input class="form-control" type="text" placeholder="Email" name="email">
          </div>
          <div class="form-group">
            <label class="control-label">Mật khẩu</label>
            <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Nhớ mật khẩu</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Quên mật khẩu ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
  
            <input class="btn btn-primary btn-block" type="submit" name="submit" value=" Đang nhập">
            
          </div>
        </form>

        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i> Quên mật khẩu ?</h3>
          <div class="form-group">
            <label class="control-label">E-mail</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i> Lưu</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Quay lại đăng nhập</a></p>
          </div>
        </form>
        <?php
        }else{
          header('location:quantri.php');
        }

        ?>
      </div>
    </section>
    <!-- Bay loi form dang nhap-->
      <script type="text/javascript">
        function checkform() {
          var regExp = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;

          var email = document.form1.email.value;
          var password = document.form1.password.value;

          if (email == "" || email == null) {
            alert('Email không được để trống!');
            document.form1.email.focus();
            return false;
          }
          if (regExp.test(email)){}else{
            alert('Email không hợp lệ!');
            document.form1.email.focus();
            return false;
          }
          if (password == "" || password == null) {
            alert('Mật khẩu không được để trống!');
            document.form1.password.focus();
            return false;
          }
          if (password.length <= 4) {
            alert('Mật khẩu quá ngắn!');
            document.form1.password.focus();
            return false;
          }
        }
      </script>
    <!-- Bay loi form dang nhap-->

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>