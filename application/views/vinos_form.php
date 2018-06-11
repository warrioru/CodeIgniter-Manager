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
				<h1 class="page-header">Vinos <?php echo $button ?></h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="<?php echo $action; ?>" method="post"
							enctype="multipart/form-data">
							<div class="form-group col-lg-6">
								<label for="varchar">Nombre del vino <?php echo form_error('nombre') ?></label>
								<input type="text" class="form-control" name="nombre"
									id="nombre" placeholder="Nombre del vino"
									value="<?php echo $nombre; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Bodega <?php echo form_error('bodega') ?></label>
								<input type="text" class="form-control" name="bodega"
									id="bodega" placeholder="Bodega" value="<?php echo $bodega; ?>" />
							</div>
							<div class="row">
								<div class="form-group col-lg-6">
									<label for="varchar">Tipo <?php echo form_error('tipo') ?></label>
									<!--  <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo" value="<?php echo $tipo; ?>" /> -->
									<select class="form-control" name="tipo" id="tipo"
										onchange="updateLosDemas()">
										<option value="<?php echo $tipo; ?>"><?php if($tipo == "") { echo "Tipo"; } else {echo $tipo; } ?></option>
										<option value="Vino Blanco">Vino Blanco</option>
										<option value="Vino Tinto">Vino Tinto</option>
										<option value="Vino Espumante">Vino Espumante</option>
										<option value="Vino Rosado">Vino Rosado</option>
										<option value="Vino Tardio">Vino Tardio</option>
										<option value="losDemas">Los demas</option>
									</select>
								</div>
								<div id="losDemas" class="form-group col-lg-6" hidden>
									<label for="varchar">Los demas<?php echo form_error('losDemas') ?></label><br>
									<input type="radio" name="tipoVarios" value="varios 1"
										<?php echo ($tipoVarios == 'varios 1') ? 'checked': ''?>> varios
									1 <br> <input type="radio" name="tipoVarios" value="varios 2"
										<?php echo ($tipoVarios == 'varios 2') ? 'checked': ''?>>
									varios 2 <br> <input type="radio" name="tipoVarios"
										value="varios 3"
										<?php echo ($tipoVarios == 'varios 3') ? 'checked': ''?>>
									varios 3 <br>
								</div>
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Cepa <?php echo form_error('cepa[]') ?></label><br>
								<input type="checkbox" name="cepa[]" value="CABERNET SAUVIGNON"
									<?php echo (strpos($cepaString, 'CABERNET SAUVIGNON') !== false) ? 'checked': '' ?>>
								CABERNET SAUVIGNON<br> <input type="checkbox" name="cepa[]"
									value="MERLOT"
									<?php echo (strpos($cepaString, 'MERLOT') !== false) ? 'checked': '' ?>>
								MERLOT<br> <input type="checkbox" name="cepa[]"
									value="CARMENERE"
									<?php echo (strpos($cepaString, 'CARMENERE') !== false) ? 'checked': '' ?>>
								CARMENERE<br> <input type="checkbox" name="cepa[]" value="MALBEC"
									<?php echo (strpos($cepaString, 'MALBEC') !== false) ? 'checked': '' ?>>
								MALBEC<br> <input type="checkbox" name="cepa[]"
									value="PINOT NOIR"
									<?php echo (strpos($cepaString, 'PINOT NOIR') !== false) ? 'checked': '' ?>>
								PINOT NOIR<br> <input type="checkbox" name="cepa[]"
									value="CABERNET FRANC"
									<?php echo (strpos($cepaString, 'CABERNET FRANC') !== false) ? 'checked': '' ?>>
								CABERNET FRANC<br> <input type="checkbox" name="cepa[]"
									value="GARNACHA"
									<?php echo (strpos($cepaString, 'GARNACHA') !== false) ? 'checked': '' ?>>
								GARNACHA<br> <input type="checkbox" name="cepa[]"
									value="CINSAULT"
									<?php echo (strpos($cepaString, 'CINSAULT') !== false) ? 'checked': '' ?>>
								CINSAULT<br> <input type="checkbox" name="cepa[]"
									value="TEMPRANILLO"
									<?php echo (strpos($cepaString, 'TEMPRANILLO') !== false) ? 'checked': '' ?>>
								TEMPRANILLO<br> <input type="checkbox" name="cepa[]" value="TINTA PAIS"
									<?php echo (strpos($cepaString, 'TINTA PAIS') !== false) ? 'checked': '' ?>>
								TINTA PAIS<br> <input type="checkbox" name="cepa[]"
									value="SYRAH"
									<?php echo (strpos($cepaString, 'SYRAH') !== false) ? 'checked': '' ?>>
								SYRAH<br> <input type="checkbox" name="cepa[]"
									value="CARIGNAN"
									<?php echo (strpos($cepaString, 'CARIGNAN') !== false) ? 'checked': '' ?>>
								CARIGNAN<br> <input type="checkbox" name="cepa[]"
									value="ROUSSANNE"
									<?php echo (strpos($cepaString, 'ROUSSANNE') !== false) ? 'checked': '' ?>>
								ROUSSANNE<br> <input type="checkbox" name="cepa[]"
									value="MARSANNE"
									<?php echo (strpos($cepaString, 'MARSANNE') !== false) ? 'checked': '' ?>>
								MARSANNE<br> <input type="checkbox" name="cepa[]"
									value="ALICANTE BOUCHET"
									<?php echo (strpos($cepaString, 'ALICANTE BOUCHET') !== false) ? 'checked': '' ?>>
								ALICANTE BOUCHET<br> <input type="checkbox" name="cepa[]" value="SANGIOVESE"
									<?php echo (strpos($cepaString, 'SANGIOVESE') !== false) ? 'checked': '' ?>>
								SANGIOVESE<br> <input type="checkbox" name="cepa[]"
									value="TOURIGA NACIONAL"
									<?php echo (strpos($cepaString, 'TOURIGA NACIONAL') !== false) ? 'checked': '' ?>>
								TOURIGA NACIONAL<br> <input type="checkbox" name="cepa[]"
									value="TOURIGA FRANCESA"
									<?php echo (strpos($cepaString, 'TOURIGA FRANCESA') !== false) ? 'checked': '' ?>>
								TOURIGA FRANCESA<br> <input type="checkbox" name="cepa[]"
									value="BONARDA"
									<?php echo (strpos($cepaString, 'BONARDA') !== false) ? 'checked': '' ?>>
								BONARDA<br> <input type="checkbox" name="cepa[]"
									value="PETIT VERDOT"
									<?php echo (strpos($cepaString, 'PETIT VERDOT') !== false) ? 'checked': '' ?>>
								PETIT VERDOT<br> <input type="checkbox" name="cepa[]"
									value="GRACIANO"
									<?php echo (strpos($cepaString, 'GRACIANO') !== false) ? 'checked': '' ?>>
								GRACIANO<br> <input type="checkbox" name="cepa[]" value="MANZUELO"
									<?php echo (strpos($cepaString, 'MANZUELO') !== false) ? 'checked': '' ?>>
								MANZUELO<br> <input type="checkbox" name="cepa[]"
									value="LAMBRUSCO TINTO"
									<?php echo (strpos($cepaString, 'LAMBRUSCO TINTO') !== false) ? 'checked': '' ?>>
								LAMBRUSCO TINTO<br> <input type="checkbox" name="cepa[]"
									value="CHARDONNAY"
									<?php echo (strpos($cepaString, 'CHARDONNAY') !== false) ? 'checked': '' ?>>
								CHARDONNAY<br> <input type="checkbox" name="cepa[]"
									value="SAUVIGNON BLANC"
									<?php echo (strpos($cepaString, 'SAUVIGNON BLANC') !== false) ? 'checked': '' ?>>
								SAUVIGNON BLANC<br> <input type="checkbox" name="cepa[]"
									value="CHENIN"
									<?php echo (strpos($cepaString, 'CHENIN') !== false) ? 'checked': '' ?>>
								CHENIN<br> <input type="checkbox" name="cepa[]"
									value="PALOMINO FINO"
									<?php echo (strpos($cepaString, 'PALOMINO FINO') !== false) ? 'checked': '' ?>>
								PALOMINO FINO<br> <input type="checkbox" name="cepa[]"
									value="GEWURZTRAMINER"
									<?php echo (strpos($cepaString, 'GEWURZTRAMINER') !== false) ? 'checked': '' ?>>
								GEWURZTRAMINER<br> <input type="checkbox" name="cepa[]" value="PINOT GRIGIO"
									<?php echo (strpos($cepaString, 'PINOT GRIGIO') !== false) ? 'checked': '' ?>>
								PINOT GRIGIO<br> <input type="checkbox" name="cepa[]"
									value="SEMILLON"
									<?php echo (strpos($cepaString, 'SEMILLON') !== false) ? 'checked': '' ?>>
								SEMILLON<br> <input type="checkbox" name="cepa[]"
									value="MUSCADET"
									<?php echo (strpos($cepaString, 'MUSCADET') !== false) ? 'checked': '' ?>>
								MUSCADET<br> <input type="checkbox" name="cepa[]"
									value="VERDEJO"
									<?php echo (strpos($cepaString, 'VERDEJO') !== false) ? 'checked': '' ?>>
								VERDEJO<br> <input type="checkbox" name="cepa[]"
									value="ALBARIÑO"
									<?php echo (strpos($cepaString, 'ALBARIÑO') !== false) ? 'checked': '' ?>>
								ALBARIÑO<br> <input type="checkbox" name="cepa[]"
									value="FERNAO PIRES"
									<?php echo (strpos($cepaString, 'FERNAO PIRES') !== false) ? 'checked': '' ?>>
								FERNAO PIRES<br> <input type="checkbox" name="cepa[]"
									value="UNGNI BLANC"
									<?php echo (strpos($cepaString, 'UNGNI BLANC') !== false) ? 'checked': '' ?>>
								UNGNI BLANC<br> <input type="checkbox" name="cepa[]"
									value="MACABEO"
									<?php echo (strpos($cepaString, 'MACABEO') !== false) ? 'checked': '' ?>>
								MACABEO<br> <input type="checkbox" name="cepa[]"
									value="PALLERADA"
									<?php echo (strpos($cepaString, 'PALLERADA') !== false) ? 'checked': '' ?>>
								PALLERADA<br> <input type="checkbox" name="cepa[]"
									value="XARELO"
									<?php echo (strpos($cepaString, 'XARELO') !== false) ? 'checked': '' ?>>
								XARELO<br> <input type="checkbox" name="cepa[]"
									value="LAMBRUSCO BLANCO"
									<?php echo (strpos($cepaString, 'LAMBRUSCO BLANCO') !== false) ? 'checked': '' ?>>
								LAMBRUSCO BLANCO<br> <input type="checkbox" name="cepa[]"
									value="GLERA"
									<?php echo (strpos($cepaString, 'GLERA') !== false) ? 'checked': '' ?>>
								GLERA<br>

							</div>
							<div class="form-group col-lg-6">
								<label for="int">Año <?php echo form_error('anio') ?></label> <input
									type="text" class="form-control" name="anio" id="anio"
									placeholder="Año" value="<?php echo $anio; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Pais <?php echo form_error('pais') ?></label>
								<!--<input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" value="<?php echo $pais; ?>" /> -->
								<select class="form-control" name="pais" id="pais">
									<option value="<?php echo $pais; ?>"><?php if($pais == "") { echo "Pais"; } else {echo $pais; } ?></option>
									<option value="Alemania">Alemania</option>
									<option value="Andorra">Andorra</option>
									<option value="Argentina">Argentina</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Belgica">Belgica</option>
									<option value="Brasil">Brasil</option>
									<option value="Canada">Canada</option>
									<option value="Chile">Chile</option>
									<option value="Croacia">Croacia</option>
									<option value="Ecuador">Ecuador</option>
									<option value="EEUU">EEUU</option>
									<option value="Espana">Espana</option>
									<option value="Francia">Francia</option>
									<option value="Hungria">Hungria</option>
									<option value="Israel">Israel</option>
									<option value="Italia">Italia</option>
									<option value="Libano">Libano</option>
									<option value="Luxemburgo">Luxemburgo</option>
									<option value="Marruecos">Marruecos</option>
									<option value="Mexico">Mexico</option>
									<option value="Nueva Zelanda">Nueva Zelanda</option>
									<option value="Paises Bajos">Paises Bajos</option>
									<option value="Peru">Peru</option>
									<option value="Polonia">Polonia</option>
									<option value="Portugal">Portugal</option>
									<option value="Rumania">Rumania</option>
									<option value="South Africa">South Africa</option>
									<option value="Suiza">Suiza</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="Uruguay">Uruguay</option>
								</select>
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Imagen <?php echo form_error('imagen') ?></label><br>
								<!--<input type="text" class="form-control" name="imagen" id="imagen" placeholder="Imagen" value="<?php echo $imagen; ?>" /> -->
								<!--<img src="<?php //echo $imagen; ?>" width=100 height=100 /> -->
								<img id="blah" alt="Imagen" src="<?php echo $imagen; ?>"
									width=100 height=100 /> <input type="file" name="imagen"
									id="imagen"
									onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
								<input type="hidden" name="prueba"
									value="<?php echo $imagen; ?>">
				           		 <?php //echo form_upload('imagen'); ?>
				       		</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Color <?php echo form_error('color') ?></label>
								<input type="text" class="form-control" name="color" id="color"
									placeholder="Color" value="<?php echo $color; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Nariz <?php echo form_error('nariz') ?></label>
								<input type="text" class="form-control" name="nariz" id="nariz"
									placeholder="Nariz" value="<?php echo $nariz; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Boca <?php echo form_error('boca') ?></label>
								<input type="text" class="form-control" name="boca" id="boca"
									placeholder="Boca" value="<?php echo $boca; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="varchar">Maridaje <?php echo form_error('maridaje') ?></label>
								<input type="text" class="form-control" name="maridaje"
									id="maridaje" placeholder="Maridaje"
									value="<?php echo $maridaje; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="float">Precio <?php echo form_error('precio') ?></label>
								<input type="text" class="form-control" name="precio"
									id="precio" placeholder="Precio" value="<?php echo $precio; ?>" />
							</div>
							<div class="form-group col-lg-6">
								<label for="descripcion">Descripcion <?php echo form_error('descripcion') ?></label>
								<textarea class="form-control" rows="3" name="descripcion"
									id="descripcion" placeholder="Descripcion"><?php echo $descripcion; ?></textarea>
							</div>
							<div class="form-group col-lg-12">
								<label for="descripcion">Es premium <?php echo form_error('esPremium') ?></label>
								<input id="esPremium" type="checkbox" name="esPremium"
									<?php echo ($esPremium == true) ? 'checked': ''?> value="1" />
							</div>
							<input type="hidden" name="id" value="<?php echo $id; ?>" />
							<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
							<a href="<?php echo site_url('vinos') ?>" class="btn btn-default">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
	<script>
	$(function() {
	    console.log( "ready!" );
	    var x = document.getElementById("tipo").value;
		console.log(x);
		if(x=='losDemas'){
			$("#losDemas").show();
			console.log('entro');
			
		}else{
			$("#losDemas").hide();
			console.log('No entro');
		}
	});

	function updateLosDemas() {
			var x = document.getElementById("tipo").value;
			console.log(x);
			if(x=='losDemas'){
				$("#losDemas").show();
				console.log('entro');
				
			}else{
				$("#losDemas").hide();
				console.log('No entro');
			}
		}
		
	</script>
</body>
</html>
