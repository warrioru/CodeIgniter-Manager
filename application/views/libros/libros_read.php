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
			<td>Imagen Libro</td>
			<td><img src="<?php echo $imagenLibro; ?>" width=100 height=100 /></td>
		</tr>
	    <tr><td>Titulo</td><td><?php echo $titulo; ?></td></tr>
	    <tr><td>Autor</td><td><?php echo $autor; ?></td></tr>
	    <tr><td>Año</td><td><?php echo $anio; ?></td></tr>
	    <tr><td>Editor</td><td><?php echo $editor; ?></td></tr>
	    <tr><td>Isbn</td><td><?php echo $isbn; ?></td></tr>
	    <tr><td>Idioma</td><td><?php echo $idioma; ?></td></tr>
	    <tr><td>Precio</td><td><?php echo $precio; ?></td></tr>
	    <tr><td>NumPaginas</td><td><?php echo $numPaginas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('libros') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
				</div>
			</div>
		</div>
	</div>
        </body>
</html>