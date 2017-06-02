<!DOCTYPE html>
<html>
	<head>
		<title> Admin | View All Products </title>
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
	<body><?php $this->load->view('backend/admin_menu')?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h1> Products </h1>
			 		<table id="glammeTable" class="table table-striped table bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Product Name</th>
								<th>Product Description</th>
								<th>Price</th>
								<th>Stock</th>
								<th>Image</th>
								<th>
									<?=anchor('admin/produk/create', 
												'Add Product', 
												['class'=>'btn btn-primary btn-sm'])?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($produk as $p) : ?>
							<tr>
								<td><?=$p->id?></td>
								<td><?=$p->nama?></td>
								<td><?=$p->deskripsi?></td>
								<td><?=$p->harga?></td>
								<td><?=$p->stok?></td>
								<td><?php 
									$p_img = ['src' => 'uploads/' . $p->gambar, 'width' => '150'];
									echo img($p_img)
									?></td>
								<td>
									<?=anchor('admin/produk/update/' . $p->id, 
												'Edit',
												['class'=>'btn btn-default btn-sm'])?>
									<?=anchor('admin/produk/delete/' . $p->id, 
												'Delete',
												['class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'])?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>	
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