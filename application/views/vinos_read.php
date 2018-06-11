<!doctype html>
<html>
<?php require 'bootstrap.php';?>
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
				<li class="active">Detalles de Vino</li>
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
							<tr>
								<td>Nombre del vino</td>
								<td><?php echo $nombre; ?></td>
							</tr>
							<tr>
								<td>Bodega</td>
								<td><?php echo $bodega; ?></td>
							</tr>
							<tr>
								<td>Tipo</td>
								<td><?php echo $tipo; ?></td>
							</tr>
							<tr>
								<td>Los demas</td>
								<td><?php echo $tipoVarios; ?></td>
							</tr>
							<tr>
								<td>Cepa</td>
								<td><?php echo $cepa; ?></td>
							</tr>
							<tr>
								<td>Año</td>
								<td><?php echo $anio; ?></td>
							</tr>
							<tr>
								<td>Pais</td>
								<td><?php echo $pais; ?></td>
							</tr>
							<tr>
								<td>Imagen</td>
								<td><img src="<?php echo $imagen; ?>" width=100 height=100 /></td>
							</tr>
							<tr>
								<td>Color</td>
								<td><?php echo $color; ?></td>
							</tr>
							<tr>
								<td>Nariz</td>
								<td><?php echo $nariz; ?></td>
							</tr>
							<tr>
								<td>Boca</td>
								<td><?php echo $boca; ?></td>
							</tr>
							<tr>
								<td>Maridaje</td>
								<td><?php echo $maridaje; ?></td>
							</tr>
							<tr>
								<td>Precio</td>
								<td><?php echo $precio; ?></td>
							</tr>
							<tr>
								<td>Descripcion</td>
								<td><?php echo $descripcion; ?></td>
							</tr>
							<tr>
								<td>Es premium</td>
								<td><?php if($esPremium == 1) { echo "Si"; } else {echo "No" ;} ?></td>
							</tr>
							<tr>
								<td></td>
								<td><a href="<?php echo site_url('vinos') ?>"
									class="btn btn-default">Cancel</a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
