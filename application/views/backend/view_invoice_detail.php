<!DOCTYPE html>
<html>
	<head>
		<title> Admin | View Invoices Detail </title>
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
				
				<h3>Items Ordered in Invoice #<?=$invoice->id?></h3>
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                            $total = 0;
                            foreach($orders as $order) : 
                            $subtotal = $order->qty * $order->price;
                            $total += $subtotal;
                        ?>
						<tr>
							<td><?=$order->produk_id?></td>
							<td><?=$order->produk_nama?></td>
							<td><?=$order->qty?></td>
							<td><?=$order->harga?></td>
							<td><?=$subtotal?></td>
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