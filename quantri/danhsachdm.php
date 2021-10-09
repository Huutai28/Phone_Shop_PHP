      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard" ></i> Danh sách danh mục </h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Danh sách danh mục </a></li>
        </ul>
      </div>
        <div class="tile">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}else{
  $page = 1;
}

$rowPerPage = 5;
$perRow = $page * $rowPerPage - $rowPerPage;

$sql = "SELECT * FROM `dmsanpham` LIMIT $perRow,$rowPerPage;";
$query = mysqli_query($conn,$sql);
$check = mysqli_num_rows($query);
if ($check > 0) {
  while ($row = mysqli_fetch_assoc($query)) {
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id_dm'] ?></th>
      <td><?php echo $row['name_dm'] ?></td>
      <td><a href="quantri.php?page_layout=suadm&id=<?php echo $row['id_dm'] ?>">Sửa</a>||<a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="deleteDm.php?id=<?php echo $row['id_dm'] ?>">Xoá</a></td>
    </tr>
  </tbody>
<?php
}
}
?>
</table>
<?php
      $totalRow = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `dmsanpham`"));
      $totalPage = ceil($totalRow/$rowPerPage);

      $listPage ="";
      $prePage ="";
      $lastPage ="";
      for ($i=1; $i <= $totalPage; $i++) { 
        if ($page == $i) {
          $listPage.='<li class="page-item active"><a class="page-link" href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
        }else{
          $listPage.='<li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
        }
      }

      $pre = $page - 1;
      $last = $page + 1;
      if ($page == 1) {
        $prePage.='<li class="page-item disabled"><a class="page-link">«</a></li>';
      }else{
        $prePage.='<li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachdm&page='.$pre.'">«</a></li>';
      }
      if ($totalPage == $page) {
        $lastPage.='<li class="page-item disabled"><a class="page-link">»</a></li>';
      }else{
        $lastPage.='<li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachdm&page='.$last.'">»</a></li>';
      }
    ?>
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
