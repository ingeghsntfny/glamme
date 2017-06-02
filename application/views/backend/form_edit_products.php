<?php
	$id = $produk->id;
	if($this->input->post('is_submitted'))
	{
		$nama 		= set_value('nama');
		$deskripsi 	= set_value('deskripsi');
		$harga 		= set_value('harga');
		$stok 		= set_value('stok');
		$gambar 	= set_value('gambar');
	}
	else
	{
		$nama 		= $produk->nama;
		$deskripsi 	= $produk->deskripsi;
		$harga 		= $produk->harga;
		$stok 		= $produk->stok;
		$gambar 	= $produk->gambar;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Admin | Edit Products </title>
		<!--load JQuery dari CDN-->
		<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<!--load DataTables dan Bootstrap dari CDN-->
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
		
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
		<!--<style>
			.row div{border:#000 0px solid}
		</style>-->
		</head>
	<body>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h1> Edit Products </h1>
				<div><?=validation_errors()?></div>
			 	<?= form_open_multipart('admin/produk/update/' . $id, ['class'=>'form-horizontal'])?>

					  <div class="form-group">
					    <label for="nama" class="col-sm-2 control-label">Product Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="nama" placeholder="Product Name" value="<?= $nama ?>">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="deskripsi" class="col-sm-2 control-label">Product Description</label>
					    <div class="col-sm-10">
					     <textarea class="form-control" name="deskripsi" placeholder="Product Description"><?= $deskripsi ?></textarea>
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="harga" class="col-sm-2 control-label">Price</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="harga" placeholder="Price" value="<?= $harga ?>">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="stok" class="col-sm-2 control-label">Stock</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="stok" placeholder="Stock" value="<?= $stok ?>">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="gambar" class="col-sm-2 control-label">Image</label>
					    <div class="col-sm-10">
					      <input type="file" class="form-control" name="userfile">
					    </div>
					  </div>
					 
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    <input type="hidden" name="is_submitted" value="1" />
					      <button type="submit" class="btn btn-default">Save</button>
					    </div>
					  </div>
					
			 	<?= form_close()?>		
			</div>
			<div class="col-md-1"></div>
		</div>
		
		<script>
			$(document).ready(function()
			{
   				 $('#glammeTable').DataTable();
			});
		</script>
	</body>
</html>