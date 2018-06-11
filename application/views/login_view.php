<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administracion Vinos</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/bootstrap/css/style.css">
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<div class="login">
	<?php echo form_open('verifylogin'); ?>
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
					<input type="text" class="login-field" name="username"
						placeholder="Usuario" id="username"> <label
						class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
					<input id="password" name="password" type="password"
						class="login-field" value="" placeholder="Clave"> <label
						class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input type="submit" class="btn btn-primary btn-md" value="Ingresar" />

				<a class="login-link" href="#">Lost your password?</a>
			</div>
			<div class="col-xs-12" style="height: 15px;"></div>
		<div class="form-group">
			<div
				class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-4"
				role="alert">
				<font color="red">
        <?php echo validation_errors(); ?>
        </font>
			</div>
		</div>
		</div>
		
	</div>

</body>
</html>