<?php
  $id = $_GET['id'];
  $sql = "SELECT `id_dm`, `name_dm` FROM `dmsanpham` WHERE id_dm = $id";
  $query = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($query);

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    if (isset($name)) {
      $sql = "UPDATE `dmsanpham` SET `name_dm`='$name' WHERE id_dm = $id";
      $query = mysqli_query($conn,$sql);

      header('location:quantri.php?page_layout=danhsachdm');
    }
  }

?>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard" ></i> Sửa danh mục </h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Sửa danh mục </a></li>
        </ul>
      </div>
     <div class="tile">
    <form method="POST">
    <div class="form-group">

    <label for="usr">Tên danh mục:</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['name_dm'] ?>">
    </div>
    
    <input type="submit" class="btn btn-primary" name="submit" value="Thêm">
</form>
</div>