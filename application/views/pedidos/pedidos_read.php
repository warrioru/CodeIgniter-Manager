<!doctype html>
<html>
<?php require __DIR__.'/../bootstrap.php';?>
    <head>
        <title>Divino</title>
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>index.php/vinos"><svg
							class="glyph stroked home">
							<use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Detalles de Pedido</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detalles</h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
        <table class="table">
	    <tr><td>NombreCliente</td><td><?php echo $nombreCliente; ?></td></tr>
	    <tr><td>NumFactura</td><td><?php echo $numFactura; ?></td></tr>
	    <tr><td>Estado</td><td><?php echo $estado; ?></td></tr>
	    <tr><td>Id Encargado Fk</td><td><?php echo $id_encargado_fk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pedidos') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
				</div>
			</div>
		</div>
	</div>
        </body>
</html>
