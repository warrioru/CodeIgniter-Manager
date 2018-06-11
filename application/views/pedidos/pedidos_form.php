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
				<li class="active">Detalles del Usuario</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pedidos <?php echo $button ?></h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NombreCliente <?php echo form_error('nombreCliente') ?></label>
            <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="NombreCliente" value="<?php echo $nombreCliente; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NumFactura <?php echo form_error('numFactura') ?></label>
            <input type="text" class="form-control" name="numFactura" id="numFactura" placeholder="NumFactura" value="<?php echo $numFactura; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Estado <?php echo form_error('estado') ?></label>
            <!-- <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" value="<?php echo $estado; ?>" /> -->
            <select class="form-control" name="estado" id="estado">
				<option value="0">En espera</option>
				<option value="1">En ruta</option>
				<option value="2">Entregado</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="int">Id Encargado Fk <?php echo form_error('id_encargado_fk') ?></label>
            <input type="text" class="form-control" name="id_encargado_fk" id="id_encargado_fk" placeholder="Id Encargado Fk" value="<?php echo $id_encargado_fk; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pedidos') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
				</div>
			</div>
		</div>
	</div>
    </body>
</html>
