﻿<?php
// Nhận từ khóa tim kiếm
if(isset($_POST["stext"])){
	$stext = $_POST["stext"];
} else {
	$stext = $_GET["stext"];
}
// Loại bỏ các khoảng trắng đầu và cuối chuỗi từ khóa
$stextNew = trim($stext);
$arr_stextNew = explode(" ", $stextNew);
$stextNew = implode("%", $arr_stextNew);
$stextNew = "%" . $stextNew . "%" ;



// Phân trang
if ( isset( $_GET[ "page" ] ) ) {
	$page = $_GET[ "page" ];
} else {
	$page = 1;
}
$rowsPerPage = 4;
$perRow = $page * $rowsPerPage - $rowsPerPage;
// Truy vấn sản phẩm có trong danh mục
$sql = "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew') ORDER BY id_sp DESC LIMIT $perRow, $rowsPerPage";
$query = mysqli_query($dbConnect, $sql);
// Tổng số bản 
$totalRows = mysqli_num_rows( mysqli_query( $dbConnect, "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew')" ) );
$totalPages = ceil( $totalRows / $rowsPerPage );

$listPage = "";
for ( $i = 1; $i <= $totalPages; $i++ ) {
	if ( $page == $i ) {
		$listPage .= '<li class="active"><a href="index.php?page_layout=danhsachtimkiem&stext='.$stext.'&page=' . $i . '">' . $i . '</a></li>';
	} else {
		$listPage .= '<li><a href="index.php?page_layout=danhsachtimkiem&stext='.$stext.'&page=' . $i . '">' . $i . '</a></li>';
	}
}
?>


<link rel="stylesheet" href="css/timkiem.css">
<div class="products">
	<h2 class="h2-bar search-bar">kết quả tìm được với từ khóa 
                <span>"<?php echo $stext; ?>"</span></h2>
	<div class="row">
	<?php
		while($row = mysqli_fetch_array($query)){
		?>
		<div class="col-md-3 col-sm-6 product-item text-center">
			<a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a>
			<h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
			<p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
			<p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
			<p class="price">Giá: <?php echo $row['gia_sp']; ?> VNĐ</p>
		</div>
		<?php
		}
		?>
	</div>
</div>
	<!-- Pagination -->
<div id="pagination">
	<nav aria-label="Page navigation">
		<ul class="pagination">
			<?php
			echo $listPage;
			?>
		</ul>
	</nav>
</div>
	<!-- End Pagination -->