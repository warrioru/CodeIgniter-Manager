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
				<li><a href="<?php echo base_url();?>index.php/libros"><svg
							class="glyph stroked home">
							<use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Detalles del Libro</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Libros <?php echo $button ?></h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
			<label for="varchar">Imagen Libro <?php echo form_error('imagenLibro') ?></label><br>
			<!--<input type="text" class="form-control" name="imagen" id="imagen" placeholder="Imagen" value="<?php echo $imagenLibro; ?>" /> -->
			<!--<img src="<?php //echo $imagen; ?>" width=100 height=100 /> -->
			<img id="blah" alt="Imagen" src="<?php echo $imagenLibro; ?>" width=100 height=100 />
			<input type="file" name="imagenLibro" id="imagenLibro" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			<input type="hidden" name="prueba" value="<?php echo $imagenLibro; ?>">
			<?php //echo form_upload('imagen'); ?>
		</div>
	    <div class="form-group">
            <label for="varchar">Titulo <?php echo form_error('titulo') ?></label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Autor <?php echo form_error('autor') ?></label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor" value="<?php echo $autor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Año <?php echo form_error('anio') ?></label>
            <input type="text" class="form-control" name="anio" id="anio" placeholder="Año" value="<?php echo $anio; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Editor <?php echo form_error('editor') ?></label>
            <input type="text" class="form-control" name="editor" id="editor" placeholder="Editor" value="<?php echo $editor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ISBN <?php echo form_error('isbn') ?></label>
            <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="<?php echo $isbn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Idioma <?php echo form_error('idioma') ?></label>
            <input type="text" class="form-control" name="idioma" id="idioma" placeholder="Idioma" value="<?php echo $idioma; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Precio <?php echo form_error('precio') ?></label>
            <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" value="<?php echo $precio; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Numero de Paginas <?php echo form_error('numPaginas') ?></label>
            <input type="text" class="form-control" name="numPaginas" id="numPaginas" placeholder="Numero de Paginas" value="<?php echo $numPaginas; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('libros') ?>" class="btn btn-default">Cancel</a>
	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    </body>
</html>