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

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach ($this->cart->contents() as $items) : 
						$i++;
				?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $items['name'] ?></td>
					<td><?= $items['qty'] ?></td>
					<td align="right"><?= number_format($items['price'],0,',','.') ?></td>
					<td align="right"><?= number_format($items['subtotal'],0,',','.') ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td align="right" colspan="4">Total</td>
					<td align="right"><?= $this->cart->total(); ?></td>
				</tr>
			</tfoot>
		</table>
		<div align="center">
				<?= anchor('welcome/clear_cart', 'Clear Cart', ['class' => 'btn btn-danger']) ?>
				<?= anchor(base_url(), 'Continue Shopping', ['class' => 'btn btn-primary']) ?>
				<?= anchor('order', 'Check Out', ['class' => 'btn btn-success']) ?>
		</div>
	</body>
</html>