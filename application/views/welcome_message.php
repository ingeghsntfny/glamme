<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GLAMME.ID | Esmeralda L.S</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top_menu') ?>
		<!--<h1>GLAMME.ID</h1>-->
		<!--menampilkan semua produk-->
		<div class="row">
		<!--looping produk-->
		<?php foreach ($produk as $p) : ?>
			<div class="col-sm-3 col-md-3">
			<div class="thumbnail">
				<!--<img src="..." alt="...">-->
				<?=img([
					'src' 	=> 'uploads/' . $p->gambar,
					'style'	=> 'max-width: 100%; max-height:100%; height:200px'
					])?>
			    <div class="caption">
				    <h3 style="min-height:30px"><?=$p->nama?></h3>
				    <p><?=$p->deskripsi?></p>
				    <p>
				    <!--<a href="<?php /*echo base_url()*/ ?>" class="btn btn-primary" role="button">Buy</a> <a href="#" class="btn btn-default" role="button">Details</a>-->
				    <?=anchor('welcome/add_to_cart/' . $p->id, 'Buy', 
				    	['class' => 'btn btn-primary', 'role' => 'button'
				    ])?>
				    </p>
			   	</div>
			</div>
			</div>
		<?php endforeach; ?>
			<!--end loop-->
		</div>
	</body>
</html>