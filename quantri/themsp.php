      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard" ></i> Thêm sản phẩm </h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
        </ul>
      </div>
<?php
if (isset($_POST['submit'])) {
    $ten_sp = $_POST['ten'];
    $gia_sp = $_POST['gia'];
    $baoHanh = $_POST['baoHanh'];
    $phuKien = $_POST['phuKien'];
    $tinhTrang = $_POST['tinhTrang'];

    $anh_sp = $_FILES['anh_sp']['name'];
    $tmp_name = $_FILES['anh_sp']['tmp_name'];

    $khuyenMai = $_POST['khuyenMai'];
    $trangThai = $_POST['trangThai'];
    $dacBiet = $_POST['dacBiet'];
    $danhMuc = $_POST['danhMuc'];
    $moTa = $_POST['moTa'];

    if (isset($ten_sp) && isset($gia_sp) && isset($baoHanh) && isset($phuKien) && isset($anh_sp) && isset($khuyenMai) && isset($trangThai) && isset($dacBiet) && isset($danhMuc) && isset($moTa) && isset($tinhTrang)) {
      $sql = "INSERT INTO `sanpham`(`id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `bao_hanh`, `phu_kien`, `trinh_trang`, `khuyen_mai`, `trang_thai`, `dac_biet`, `chi_tiet_sp`) VALUES ('$danhMuc','$ten_sp','$anh_sp','$gia_sp','$baoHanh','$phuKien','$tinhTrang','$khuyenMai','$trangThai','$dacBiet','$moTa')";

       $query = mysqli_query($conn, $sql);

       move_uploaded_file($tmp_name, '../upload/'.$anh_sp);
       header("Location:quantri.php?page_layout=danhsach");
    }
}
?>
      <div class="tile">
        <form name="form1" method="POST" onsubmit="return checkuu()" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" class="form-control" name="ten" id="ten">
          </div>

          <div class="form-group">
            <label for="ten">Giá sản phẩm</label>
            <input type="text" class="form-control" name="gia" id="gia">
          </div>

          <div class="form-group">
            <label for="ten">Bảo hành</label>
            <input type="text" class="form-control" name="baoHanh" id="baoHanh">
          </div>

          <div class="form-group">
            <label for="ten">Đi kèm theo</label>
            <input type="text" class="form-control" name="phuKien" id="phuKien">
          </div>

          <div class="form-group">
            <label for="ten">Tình trạng</label>
            <input type="text" class="form-control" name="tinhTrang" id="tinhTrang">
          </div>

          <div class="form-group">
            <label for="ten">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="anh_sp" id="img">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="ten">Khuyến mại</label>
            <input type="text" class="form-control" name="khuyenMai" id="khuyenMai">
          </div>

          <fieldset class="form-group">
            <label>Trạng thái</label>
             <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" id="trangThai1" type="radio" name="trangThai" value="0" checked="">Hết hàng
                 </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="trangThai2" type="radio" name="trangThai" value="1">Còn hàng
                      </label>
                    </div>
                  </fieldset>

           <fieldset class="form-group">
            <label>Sản phẩm đặc biệt</label>
             <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" id="dacBiet1" type="radio" name="dacBiet" value="0" checked="">Không đặc biệt
                 </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="dacBiet2" type="radio" name="dacBiet" value="1">Đặc biệt
                      </label>
                    </div>
                  </fieldset>

          <div class="form-group">
            <label for="ten">Nhà cung cấp</label>
            <select class="form-control" name="danhMuc" id="danhMuc">
              <option>----Chọn----</option>
              <?php
                $sqlDm = "SELECT * FROM `dmsanpham`";
                $queryDm = mysqli_query($conn,$sqlDm);
                $checkDm = mysqli_num_rows($queryDm);
                if ($checkDm > 0) {
                  while($rowDm = mysqli_fetch_assoc($queryDm)){
                    ?>
                    <option value="<?php echo $rowDm['id_dm']?>"><?php echo $rowDm['name_dm'] ?></option>
               <?php
                  }}
                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="ten">Mô tả sản phẩm</label>
            <textarea class="form-control" rows="5" name="moTa" id="moTa" required="">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll Wörter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</textarea>
            <script type="text/javascript">
              CKEDITOR.replace('moTa');
            </script>
          </div>
          </div>

          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Thêm">
        </form>
      </div>
      <script type="text/javascript">
        function checkuu(){
          var ten = document.getElementById('ten').value;
          var gia = document.getElementById('gia').value;
          var baoHanh = document.getElementById('baoHanh').value;
          var phuKien = document.getElementById('phuKien').value;
          var tinhTrang = document.getElementById('tinhTrang').value;
          var img = document.getElementById('img');
          var imgExt = ['ipeg','png','jpg'];
          var khuyenMai = document.getElementById('khuyenMai').value;
          var danhMuc = document.getElementById('danhMuc').value;
          var moTa = document.getElementById('moTa').value;
          if (ten == "") {
          alert('Tên sản phẩm không được để trống!');
          document.getElementById('ten').focus();
          return false;
          }
          if (ten.length <= 3) {
          alert('Tên sản phẩm quá ngắn!');
          document.getElementById('ten').focus();
          return false;
          }
          if (gia == "") {
          alert('Giá sản phẩm không được để trống!');
          document.getElementById('gia').focus();
          return false;
          }
          if (isNaN(gia)) {
          alert('Giá sản phẩm phải số!');
          document.getElementById('gia').focus();
          return false;
          }
          if (gia.length <= 3 ) {
          alert('Giá sản phẩm quá thấp!');
          document.getElementById('gia').focus();
          return false;
          }
          if (baoHanh == "") {
          alert('Bảo hành không được bỏ trống!');
          document.getElementById('baoHanh').focus();
          return false;
          }
          if (phuKien == "") {
          alert('Phụ kiện không được bỏ trống!');
          document.getElementById('phuKien').focus();
          return false;
          }
          if (tinhTrang == "") {
          alert('Tình trạng máy không được bỏ trống!');
          document.getElementById('tinhTrang').focus();
          return false;
          }
          if (img.value != "") {
        var img_ext = img.value.substring(img.value.lastIndexOf('.')+1);
        var result = imgExt.includes(img_ext);

        if (result == false) {
          alert('File phải có duôi hợp lệ!');
        document.getElementById('img').focus();
        return false;
        }else{
          if (parseFloat(img.files[0].size/(1024*1024))>=3) {
            alert('File không quá 3 mb. Kích cỡ ảnh '+parseFloat(img.files[0].size/(1024*1024)) );
            document.getElementById('img').focus();
            return false;
          }
        }
      }else{
        alert('Sản phẩm phải có ảnh!');
        document.getElementById('img').focus();
        return false;
      }
          if (khuyenMai == "") {
          alert('Khuyến Mại không được bỏ trống!');
          document.getElementById('khuyenMai').focus();
          return false;
          }
          if (isNaN(danhMuc)) {
          alert('Nhà cung cấp chưa chọn!');
          document.getElementById('danhMuc').focus();
          return false;
          }
          if (moTa == "") {
          alert('Mô Tả sản phẩm không được để trống!');
          document.getElementById('danhMuc').focus();
          return false;
          }
        }
        
      </script>