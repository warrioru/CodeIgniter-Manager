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
				<h1 class="page-header">Usuarios <?php echo $button ?></h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">First Name <?php echo form_error('first_name') ?></label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Last Name <?php echo form_error('last_name') ?></label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Is Active <?php echo form_error('is_active') ?></label>
            <!-- <input type="text" class="form-control" name="is_active" id="is_active" placeholder="Is Active" value="<?php echo $is_active; ?>" /> -->
            <select class="form-control" name="is_active" id="is_active">
				<option value="1" >True</option>
				<option value="0" <?php if (!$is_active) { echo 'selected'; }  else echo ''; ?> >False</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="int">Id Role Fk <?php echo form_error('id_role_fk') ?></label>
            <!-- <input type="text" class="form-control" name="id_role_fk" id="id_role_fk" placeholder="Id Role Fk" value="<?php echo $id_role_fk; ?>" /> -->
            <select class="form-control" name="id_role_fk" id="id_role_fk">
				<option value="1">Admin</option>
				<option value="2" <?php if ($id_role_fk === "2") { echo 'selected'; }  else echo ''; ?>>Vendedor</option>
                <option value="3" <?php if ($id_role_fk === "3") { echo 'selected'; }  else echo ''; ?>>Transportista</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="varchar">Url Foto <?php echo form_error('urlFoto') ?></label>
            <!-- <input type="text" class="form-control" name="id_role_fk" id="id_role_fk" placeholder="Id Role Fk" value="<?php echo $id_role_fk; ?>" /> -->
            <img id="blah" alt="Imagen" src="<?php echo $urlFoto; ?>"
                 width=64 height=64 /> <input type="file" name="urlFoto"
                                                id="urlFoto"
                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <input type="hidden" name="prueba"
                   value="<?php echo $urlFoto; ?>">
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usuarios') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
				</div>
			</div>
		</div>
	</div>
    </body>
</html>
