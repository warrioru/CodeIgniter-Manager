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
				<li class="active">Codigos QR Para Vinos</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Lista de Codigos QR</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="col-md-12" style="background: white">
		<?php
		foreach ( $vinos_data as $vinos ) {
			?>
			<div class="col-md-3">
				<div class="col-md-12">
					<h5>
						<span style="font-weight: bold">Nombre del vino: </span> <?php echo $vinos->nombre ?></h5>
				</div>
				<div class="col-md-12">
				<h5>
						<span style="font-weight: bold">Pais: </span> <?php echo $vinos->pais ?></h5>
				</div>
				<div class="col-md-12">
				<?php echo '<img src="'.base_url("/uploads/".$vinos->id.".png"). '" width=180
									height=180 />';  ?>
				</div>
			</div>
			<?php
		}
		?>
		</div>

	</div>
	<!--/.main-->

</body>
</html>
