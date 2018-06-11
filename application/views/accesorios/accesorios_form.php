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
				<li class="active">Detalles del Accesorio</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Accesorios <?php echo $button ?></h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nombre <?php echo form_error('nombre') ?></label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" />
        </div>
        <div class="form-group">
			<label for="varchar">Imagen Accesorio <?php echo form_error('imagenAcc') ?></label><br>
			<img id="blah" alt="Imagen" src="<?php echo $imagenAcc; ?>" width=100 height=100 />
			<input type="file" name="imagenAcc" id="imagenAcc" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			<input type="hidden" name="prueba" value="<?php echo $imagenAcc; ?>">
		</div>
		<div class="form-group">
            <label for="varchar">Precio <?php echo form_error('precio') ?></label>
            <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" value="<?php echo $precio; ?>" />
        </div>
        
	    <div class="form-group">
            <label for="descripcion">Descripcion <?php echo form_error('descripcion') ?></label>
            <textarea class="form-control" rows="3" name="descripcion" id="descripcion" placeholder="Descripcion"><?php echo $descripcion; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('accesorios') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
				</div>
			</div>
		</div>
	</div>
    </body>
</html>