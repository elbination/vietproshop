<script>
	function searchFocus(){ // sự kiện đưa chuột vào vùng form
		if(document.sform.stext.value == "Tìm kiếm sản phẩm..."){
			document.sform.stext.value = "";
		}
	}
	
	function searchBlur(){ // Sự kiện đưa chuột ra khỏi ô text
		if(document.sform.stext.value == ""){
			document.sform.stext.value = "Tìm kiếm sản phẩm...";
		}
	}
</script>
<div id="search" class="col-md-4 col-sm-12 col-xs-12">
	<form method="post" name="sform" action="index.php?page_layout=danhsachtimkiem">
		<input type="submit" name="submit" value="">
		<input onFocus="searchFocus();" onBlur="searchBlur();" type="text" name="stext" value="Tìm kiếm sản phẩm...">
	</form>
</div>