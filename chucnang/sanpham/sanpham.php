<?php
$sql = "SELECT * FROM sanpham WHERE dac_biet = 1 ORDER BY id_sp DESC LIMIT 8";
$query = mysqli_query($dbConnect, $sql);
?>


<div class="products">
	<h2 class="h2-bar">sản phẩm đặc biệt</h2>
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

<?php
$sqlMoi = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 8";
$queryMoi = mysqli_query($dbConnect, $sqlMoi);
?>


<div class="products">
	<h2 class="h2-bar">sản phẩm mới</h2>
	<div class="row">
	<?php
		while($rowMoi = mysqli_fetch_array($queryMoi)){
		?>
		<div class="col-md-3 col-sm-6 product-item text-center">
			<a href="index.php?page_layout=chitietsp&id_sp=<?php echo $rowMoi['id_sp']; ?>"><img width="80" height="144" src="quantri/anh/<?php echo $rowMoi['anh_sp']; ?>"></a>
			<h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $rowMoi['id_sp']; ?>"><?php echo $rowMoi['ten_sp']; ?></a></h3>
			<p>Bảo hành: <?php echo $rowMoi['bao_hanh']; ?></p>
			<p>Tình trạng: <?php echo $rowMoi['tinh_trang']; ?></p>
			<p class="price">Giá: <?php echo $rowMoi['gia_sp']; ?> VNĐ</p>
		</div>
		<?php
		}
		?>
	</div>
</div>