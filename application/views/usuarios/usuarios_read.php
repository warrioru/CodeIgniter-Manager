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
				<li class="active">Detalles de Usuario</li>
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
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
	    <tr><td>Is Active</td><td><?php if ($is_active === '1') { echo 'True'; } else { echo 'False'; } ?></td></tr>
	    <tr><td>Id Role Fk</td><td><?php if ($id_role_fk === '1') { echo 'Admin'; } else { echo 'Vendedor'; } ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('usuarios') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	</div>
				</div>
			</div>
		</div>
	</div>
        </body>
</html>
