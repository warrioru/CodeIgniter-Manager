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
				<li><a href="<?php echo base_url();?>index.php/usuarios"><svg
							class="glyph stroked home">
							<use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Administracion de Usuarios</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Lista de Pedidos</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row" style="margin-bottom: 10px">
							<div class="col-md-4">
                <?php echo anchor(site_url('pedidos/create'),'Agregar', 'class="btn btn-primary"'); ?>
            </div>
							<div class="col-md-4 text-center">
								<div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
							</div>
							<div class="col-md-1 text-right"></div>
							<div class="col-md-3 text-right">
								<form action="<?php echo site_url('pedidos/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pedidos'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NombreCliente</th>
		<th>NumFactura</th>
		<th>Estado</th>
		<th>Id Encargado Fk</th>
		<th>Action</th>
            </tr><?php
            foreach ($pedidos_data as $pedidos)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pedidos->nombreCliente ?></td>
			<td><?php echo $pedidos->numFactura ?></td>
			<td><?php if ($pedidos->estado === '0') { echo 'En espera'; } else if ($pedidos->estado === '1') { echo 'En ruta'; } else if ($pedidos->estado === '2') { echo 'Entregado'; } ?></td>
			<td><?php echo $pedidos->id_encargado_fk ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pedidos/read/'.$pedidos->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pedidos/update/'.$pedidos->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pedidos/delete/'.$pedidos->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
