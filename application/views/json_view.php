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
	<title>View json</title>
</head>
<body>
	<?php include "menu.php"; ?>
	
	<div class="container">
		<div class="card-deck">
			<?php foreach ($ketqua_gui_json_view as $value): ?>
				<div class="card"> 
				    <div class="card-block">
				      <h4 class="card-title">Ten:<?= $value->ten?></h4>
				      <p class="card-text">Số điện thoại: <?=$value->sdt?>.</p>
				 	</div>
				 	<a href="<?= base_url() ?>json_controller/xoa_json/<?= $value->sdt ?>" class="btn btn-success"><i class="fa fa-remove"></i></a>
				 </div>
			<?php endforeach ?>
	</div>

	<!-- Tạo form để đăng ký dư liệu -->
	<form method="post" action="<?= base_url() ?>json_controller/addnewData">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Tên của bạn</label>
	    <input name="ten" type="text" class="form-control" id="ten" aria-describedby="emailHelp" placeholder="Enter your name">
	    <small id="emailHelp" class="form-text text-muted">Trust me :v</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Số điện thoại của bạn</label>
	    <input name="sdt" type="text" class="form-control" id="sdt" placeholder="Your telephone">
	  </div>
	  <div class="form-check">
	    <label class="form-check-label">
	      <input type="checkbox" class="form-check-input">
	      Check me out
	    </label>
	  </div>
	  <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
	</form>
</body>
</html>