<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
	<title>Edit json</title>
</head>
<body>
	<?php include "menu.php"; ?>

	<form method="post" action="<?= base_url() ?>json_edit_controller/editData">
	<div class="container">
			<?php $stt=0 ?>
			<?php foreach ($mangdl as $value): ?>
				<?php $stt++ ?>
				<h1>Bản contact thứ <?= $stt ?></h1>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Tên của bạn là</label>
				    <!-- trong name ta thêm ký hiệu [] trước ten mục đích là khi ấn nút submit thì dữ liệu có thể
				    gửi nhiều tên cùng lúc và tương ứng với dữ liệu
				     -->
				    <input name="ten[]" type="text" class="form-control" id="ten" aria-describedby="emailHelp" value="<?= $value['ten'] ?>">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Số điện thoại của bạn là</label>
				    <input name="sdt[]" type="text" class="form-control" id="sdt" value="<?= $value['sdt'] ?>">
				  </div>
				  <div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input">
				      Check me out
				    </label>
				  </div>
			<?php endforeach ?>
			<button type="submit" class="btn btn-primary">Cập nhật dữ liệu</button>
	</div>
	</form>
</body>
</html>