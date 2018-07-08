<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
	href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/bootstrap/css/styles.css">
    <link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!--Icons-->
<script src="<?php echo base_url();?>assets/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url();?>index.php/vinos"><span>Di</span>Vino</a>
				<ul class="user-menu">
					<li class="dropdown pull-right"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use></svg> User <span
							class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url()?>index.php/vinos/logout"><svg
										class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul></li>
				</ul>
			</div>

		</div>
		<!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="item"><a href="<?php echo base_url();?>index.php/vinos"><svg
						class="glyph stroked home">
						<use xlink:href="#stroked-home"></use></svg>Vinos</a></li>
			<li ><a href="<?php echo base_url();?>index.php/entregas"><svg
						class="glyph stroked open folder">
			<use xlink:href="#stroked-open-folder" /></svg> Entregas</a></li>
			<li ><a
				href="<?php echo base_url();?>index.php/accesorios"><svg
						class="glyph stroked mobile device">
						<use xlink:href="#stroked-mobile-device" /></svg> Accesorios</a></li>
			<li ><a href="<?php echo base_url();?>index.php/publicidad"><svg
						 class="glyph stroked camera ">
			<use xlink:href="#stroked-camera"/></svg> Publicidad</a></li>
			<li role="presentation" class="divider"></li>
			<li ><a href="<?php echo base_url();?>index.php/vinosqr"><svg class="glyph stroked printer">
						<use xlink:href="#stroked-printer"></use></svg> Codigos QR</a></li>
			<li role="presentation" class="divider"></li>
			<li ><a href="<?php echo base_url();?>index.php/usuarios"><svg class="glyph stroked star">
						<use xlink:href="#stroked-male-user"></use></svg> Usuarios</a></li>
		</ul>

	</div>
	<!--/.sidebar-->

<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<!--	<script src="--><?php //echo base_url();?><!--assets/js/bootstrap.js"></script>-->

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/date.js" charset="UTF-8"></script>


	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	    
	$(document).ready(function() {

            $('.active').removeClass('active');
	var currurl = window.location.protocol +"//"+ window.location.host + window.location.pathname ;
	console.log(currurl);
            var val=$('li:has(a[href="'+currurl+'"])').addClass('active');
        });
		
	</script>
</body>

</html>
