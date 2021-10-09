
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard" ></i> Thêm danh mục </h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Thêm danh mục </a></li>
        </ul>
      </div>
      <div class="tile">
          <?php
if (isset($_POST['submit'])) {
  $ten_dm = $_POST['name'];
  if (isset($ten_dm)) {
    $sql = "INSERT INTO dmsanpham(name_dm) VALUES ('$ten_dm');";
    $query = mysqli_query($conn,$sql);

    header("Location:quantri.php?page_layout=danhsachdm");
  }
}

?>
    <form method="POST" onsubmit="return checkForm()">

    <div class="form-group">
      <label for="name">Tên danh mục:</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Thêm">

</form>
</div>
<script type="text/javascript">
    function checkForm() {
      var catName = document.getElementById('name').value;
      if (catName == "") {
        alert('Tên danh mục không được để trống!');
        document.getElementById('name').focus();
        return false;
      }
      if (catName.length <= 2) {
        alert('Tên danh mục không được nhỏ hơn 2 kí tự!');
        document.getElementById('name').focus();
        return false;
      }
    }
  </script>