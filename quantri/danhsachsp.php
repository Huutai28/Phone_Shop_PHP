      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard" ></i> Danh sách sản phẩm</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Danh sách sản phẩm</a></li>
        </ul>
      </div>
        <div class="tile">


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Nhà cung cấp</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Trạng thái</th>
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

$sql = "SELECT * FROM `sanpham`LIMIT $perRow,$rowPerPage;";
$query = mysqli_query($conn,$sql);
$check = mysqli_num_rows($query);
if ($check > 0) {
  while ($row = mysqli_fetch_assoc($query)) {
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id_sp'] ?></th>
      <td><?php echo $row['ten_sp'] ?></td>
      <td><?php echo $row['gia_sp'] ?></td>
      
        <?php
          $idDm = $row['id_dm'];
          $sqlDm = "SELECT * FROM `dmsanpham` WHERE id_dm = $idDm;";
          $queryDm = mysqli_query($conn,$sqlDm);
          $checkDm = mysqli_num_rows($queryDm);
          if ($checkDm > 0) {
            $rowDm = mysqli_fetch_assoc($queryDm);
             ?>
             <td><?php echo $rowDm['name_dm'] ?></td>
             <?php
           }
             ?>

      <td><img width=60 src="../upload/<?php echo $row['anh_sp'] ?>"></td>
      <td><?php if ($row['trang_thai'] == 0) {
                  echo 'Hết hàng';
                }else{
                  echo 'Còn hàng';
                }  ?></td>
      <td><a href="quantri.php?page_layout=suasp&id=<?php echo $row['id_sp'] ?>">Sửa</a>||<a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="deleteSp.php?id=<?php echo $row['id_sp'] ?>">Xóa</a></td>
    </tr>
  </tbody>
  <?php
    }}
  ?>
</table>
<?php
      $totalRow = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `sanpham`"));
      $totalPage = ceil($totalRow/$rowPerPage);

      $listPage ="";
      $prePage ="";
      $lastPage ="";
      for ($i=1; $i <= $totalPage; $i++) { 
        if ($page == $i) {
          $listPage.='<li class="page-item active"><a class="page-link" href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
        }else{
          $listPage.='<li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
        }
      }

      $pre = $page - 1;
      $last = $page + 1;
      if ($page == 1) {
        $prePage.='<li class="page-item disabled"><a class="page-link">«</a></li>';
      }else{
        $prePage.='<li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachsp&page='.$pre.'">«</a></li>';
      }
      if ($totalPage == $page) {
        $lastPage.='<li class="page-item disabled"><a class="page-link">»</a></li>';
      }else{
        $lastPage.='<li class="page-item"><a class="page-link" href="quantri.php?page_layout=danhsachsp&page='.$last.'">»</a></li>';
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