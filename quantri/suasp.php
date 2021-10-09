      <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `sanpham` WHERE id_sp = $id;";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);

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

          if ($anh_sp == "") {
            $sql = "UPDATE `sanpham` SET `id_dm`='$danhMuc',`ten_sp`='$ten_sp',`gia_sp`='$gia_sp',`bao_hanh`='$baoHanh',`phu_kien`='$phuKien',`trinh_trang`='$tinhTrang',`khuyen_mai`='$khuyenMai',`trang_thai`='$trangThai',`dac_biet`='$dacBiet',`chi_tiet_sp`='$moTa' WHERE id_sp = $id";
          }else{
            $sql = "UPDATE `sanpham` SET `id_dm`='$danhMuc',`ten_sp`='$ten_sp',`gia_sp`='$gia_sp',`bao_hanh`='$baoHanh',`phu_kien`='$phuKien',`trinh_trang`='$tinhTrang',`khuyen_mai`='$khuyenMai',`trang_thai`='$trangThai',`dac_biet`='$dacBiet',`chi_tiet_sp`='$moTa',`anh_sp`='$anh_sp' WHERE id_sp = $id";
          }
          $query = mysqli_query($conn, $sql);

          move_uploaded_file($tmp_name, '../upload/'.$anh_sp);
          header("Location:quantri.php?page_layout=danhsachsp");
        }
      ?>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard" ></i> Sửa sản phẩm </h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Sửa sản phẩm</a></li>
        </ul>
      </div>


        <div class="tile">
    <form name="form1" method="POST" onsubmit="return checkuu()" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" class="form-control" name="ten" id="ten" value="<?php echo $row['ten_sp'] ?>">
          </div>

          <div class="form-group">
            <label for="ten">Giá sản phẩm</label>
            <input type="text" class="form-control" name="gia" id="gia" value="<?php echo $row['gia_sp'] ?>">
          </div>

          <div class="form-group">
            <label for="ten">Bảo hành</label>
            <input type="text" class="form-control" name="baoHanh" id="baoHanh" value="<?php echo $row['bao_hanh'] ?>">
          </div>

          <div class="form-group">
            <label for="ten">Đi kèm theo</label>
            <input type="text" class="form-control" name="phuKien" id="phuKien" value="<?php echo $row['phu_kien'] ?>">
          </div>

          <div class="form-group">
            <label for="ten">Tình trạng</label>
            <input type="text" class="form-control" name="tinhTrang" id="tinhTrang" value="<?php echo $row['trinh_trang'] ?>">
          </div>

          <div class="form-group">
            <label for="ten">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="anh_sp" id="img" value="<?php echo $row['anh_sp'] ?>">
          </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="ten">Khuyến mại</label>
            <input type="text" class="form-control" name="khuyenMai" id="khuyenMai" value="<?php echo $row['khuyen_mai'] ?>">
          </div>

          <fieldset class="form-group">
            <label>Trạng thái</label>
             <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" id="trangThai1" type="radio" name="trangThai" value="0" <?php if ($row['trang_thai'] == 0) { echo 'checked'; } ?>>Hết hàng
                 </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="trangThai2" type="radio" name="trangThai" value="1" <?php if ($row['trang_thai'] == 1) { echo 'checked'; } ?>>Còn hàng
                      </label>
                    </div>
                  </fieldset>

           <fieldset class="form-group">
            <label>Sản phẩm đặc biệt</label>
             <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" id="dacBiet1" type="radio" name="dacBiet" value="0" <?php if ($row['dac_biet'] == 0) { echo 'checked'; } ?>>Không đặc biệt
                 </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="dacBiet2" type="radio" name="dacBiet" value="1" <?php if ($row['dac_biet'] == 1) { echo 'checked'; } ?>>Đặc biệt
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
                    <option <?php
                    if ($row['id_dm'] == $rowDm['id_dm']) {
                      echo 'selected';
                    }
                  ?> 
                  value="<?php echo $rowDm['id_dm']?>"><?php echo $rowDm['name_dm'] ?></option>
               <?php
                  }}
                ?>
            </select>
          </div>

          <div class="form-group">
            <label for="ten">Mô tả sản phẩm</label>
            <textarea class="form-control" rows="5" name="moTa" id="moTa" required=""><?php echo $row['chi_tiet_sp'] ?></textarea>
            <script type="text/javascript">
              CKEDITOR.replace('moTa');
            </script>
          </div>
          </div>

          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Sửa">
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