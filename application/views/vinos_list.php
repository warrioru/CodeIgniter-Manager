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
				<li class="active">Administracion de Vinos</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Lista de Vinos</h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row" style="margin-bottom: 10px">
							<div class="col-md-4">
                <?php echo anchor(site_url('vinos/create'),'Agregar', 'class="btn btn-primary"'); ?>
            </div>
							<div class="col-md-4 text-center">
								<div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
							</div>
							<div class="col-md-1 text-right"></div>
							<div class="col-md-3 text-right">
								<form action="<?php echo site_url('vinos/index'); ?>"
									class="form-inline" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="q"
											value="<?php echo $q; ?>"> <span class="input-group-btn">
                            <?php
																												if ($q != '') {
																													?>
                                    <a
											href="<?php echo site_url('vinos'); ?>"
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
								<th>Imagen</th>
								<th>Nombre del vino</th>
								<th>Bodega</th>
								<th>Tipo</th>
								<th>Cepa</th>
								<th>Año</th>
								<th>Pais</th>
								<th>Precio</th>
								<th>Descripcion</th>
								<th>Action</th>
							</tr><?php
							foreach ( $vinos_data as $vinos ) {
								?>
                <tr>
								<td width="80px"><?php echo ++$start ?></td>
								<td><img src="<?php echo $vinos->imagen; ?>" width=80
									height=80 /></td>
								<td><?php echo $vinos->nombre ?></td>
								<td><?php echo $vinos->bodega ?></td>
								<td><?php echo $vinos->tipo ?></td>
								<td><?php echo $vinos->cepa ?></td>
								<td><?php echo $vinos->anio ?></td>
								<td><?php echo $vinos->pais ?></td>
								<td><?php echo $vinos->precio ?></td>
								<td><textarea rows="3" disabled><?php echo $vinos->descripcion ?></textarea> </td>
								<td style="text-align: center" width="200px">
				<?php
								echo anchor ( site_url ( 'vinos/read/' . $vinos->id ), 'Read' );
								echo ' | ';
								echo anchor ( site_url ( 'vinos/update/' . $vinos->id ), 'Update' );
								echo ' | ';
								echo anchor ( site_url ( 'vinos/delete/' . $vinos->id ), 'Delete', 'onclick="javascript: return confirm(\'Are You Sure ?\')"' );
								?>
			</td>
							</tr>
                <?php
							}
							?>
        </table>
						<div class="row">
							<div class="col-md-6">
								<h5>
									<span style="font-weight: bold">Total: </span><?php echo $total_rows ?></h5>
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
