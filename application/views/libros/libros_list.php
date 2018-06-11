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
				<li class="active">Administracion de Libros</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Lista de Libros</h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row" style="margin-bottom: 10px">
							<div class="col-md-4">
                <?php echo anchor(site_url('libros/create'),'Agregar', 'class="btn btn-primary"'); ?>
            </div>
							<div class="col-md-4 text-center">
								<div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
							</div>
							<div class="col-md-1 text-right"></div>
							<div class="col-md-3 text-right">
								<form action="<?php echo site_url('libros/index'); ?>"
									class="form-inline" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="q"
											value="<?php echo $q; ?>"> <span class="input-group-btn">
                            <?php
																												if ($q != '') {
																													?>
                                    <a
											href="<?php echo site_url('libros'); ?>"
											class="btn btn-default">Resetear</a>
                                    <?php
																												}
																												?>
                          <button class="btn btn-primary" type="submit">Buscar</button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<table class="table table-bordered table-striped"
							style="margin-bottom: 10px">
							<tr class="info">
								<th>No</th>
								<th>Imagen Libro</th>
								<th>Titulo</th>
								<th>Autor</th>
								<th>Año</th>
								<th>Editor</th>
								<th>ISBN</th>
								<th>Idioma</th>
								<th>Precio</th>
								<th>Numero de Paginas</th>
								<th>Action</th>
							</tr><?php
							foreach ( $libros_data as $libros ) {
								?>
                <tr>
								<td width="80px"><?php echo ++$start ?></td>
								<td><img src="<?php echo $libros->imagenLibro; ?>" width=80
									height=80 /></td>
								<td><?php echo $libros->titulo ?></td>
								<td><?php echo $libros->autor ?></td>
								<td><?php echo $libros->anio ?></td>
								<td><?php echo $libros->editor ?></td>
								<td><?php echo $libros->isbn ?></td>
								<td><?php echo $libros->idioma ?></td>
								<td><?php echo $libros->precio ?></td>
								<td><?php echo $libros->numPaginas ?></td>
								<td style="text-align: center" width="200px">
				<?php
								echo anchor ( site_url ( 'libros/read/' . $libros->id ), 'Read' );
								echo ' | ';
								echo anchor ( site_url ( 'libros/update/' . $libros->id ), 'Update' );
								echo ' | ';
								echo anchor ( site_url ( 'libros/delete/' . $libros->id ), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"' );
								?>
			</td>
							</tr>
                <?php
							}
							?>
        </table>
						<div class="row">
							<div class="col-md-6">
								<h5><span style="font-weight: bold">Total: </span><?php echo $total_rows ?></h5>
							</div>
							<div class="col-md-6 text-right">
                <?php echo $pagination?>
            </div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.col-->
		</div>
		<!-- /.row -->

	</div>
	<!--/.main-->
</body>
</html>