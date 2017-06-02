<!DOCTYPE html>
<html>
	<head>
		<title> Admin | View All Invoices </title>
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
								<th>ID Invoice</th>
								<th>Date</th>
								<th>Due Date</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($invoices as $invoice) : ?>
							<tr>
								<td><?=$invoice->id?></td>
								<td><?=$invoice->date?></td>
								<td><?=$invoice->due_date?></td>
								<td><?=$invoice->status?></td>
								<td>
									<?=anchor('admin/invoices/detail/' . $invoice->id, 
												'Detail',
												['class'=>'btn btn-default btn-sm'])?>
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