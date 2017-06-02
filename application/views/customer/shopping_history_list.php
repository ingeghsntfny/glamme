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
		<?php if($history != false) : ?>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Invoice ID #</th>
					<th>Invoice Date</th>
					<th>Due date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach($history as $row) :
				?>
				<tr>
					<td><?= $row->id ?></td>
					<td><?= $row->date ?></td>
					<td><?= $row->due_date ?></td>
					<td><?= $row->status ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<p align="center"> There are no shopping history for you. <?=anchor('/','Shop now')?></p>
	<?php endif; ?>
	</body>
</html>