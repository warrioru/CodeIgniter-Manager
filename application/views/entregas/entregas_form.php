<!doctype html>
<html>
<?php require __DIR__.'/../bootstrap.php';?>
<head>
    <title>Divino</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/js/jquery.datetimepicker.css"/>

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
            <h1 class="page-header">Entregas <?php echo $button ?></h1>
        </div>
    </div>
    <!--/.row-->

    <?php
    //conseguir transportista

    $this->db->select ( 'id, first_name, last_name' );
    $this->db->from ( 'usuarios' );
    $this->db->where ( 'id_role_fk', '3' );

    $query = $this->db->get ();
    $result = $query->result_array();
    $optionsEncargado = '';
    foreach ($result as $encargado) {
        if ($id_encargado_fk === $encargado['id']) {
            $optionsEncargado .= '<option value=' . $encargado['id'] . ' selected>' . $encargado['first_name'] . " " . $encargado['last_name'] . '</option>';
        } else {
            $optionsEncargado .= '<option value=' . $encargado['id'] . '>' . $encargado['first_name'] . " " . $encargado['last_name'] . '</option>';
        }
    }

    //conseguir vendedores
    $this->db->select ( 'id, first_name, last_name' );
    $this->db->from ( 'usuarios' );
    $this->db->where ( 'id_role_fk', '2' );

    $query = $this->db->get ();
    $result = $query->result_array();
    $optionsVendedor = '';
    foreach ($result as $vendedor) {
    if ($id_vendedor_fk === $encargado['id']) {
        $optionsVendedor .= '<option value=' . $vendedor['id'] . ' selected>' . $vendedor['first_name'] . " " . $vendedor['last_name'] . '</option>';
    } else {
        $optionsVendedor .= '<option value=' . $vendedor['id'] . '>' . $vendedor['first_name'] . " " . $vendedor['last_name'] . '</option>';
    }
    }

    ?>



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
                            <label for="datetime">FechaEntrega <?php echo form_error('fechaEntrega') ?></label>
                            <!-- <input type="datetime-local" class="form-control" name="fechaEntrega" id="fechaEntrega" placeholder="FechaEntrega" value="<?php echo $fechaEntrega; ?>" /> -->
                            <input type="text" id="demo"/>

                        </div>
                        <div class="form-group">
                            <label for="varchar">Direccion <?php echo form_error('direccion') ?></label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" value="<?php echo $direccion; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="observaciones">Observaciones <?php echo form_error('observaciones') ?></label>
                            <textarea class="form-control" rows="3" name="observaciones" id="observaciones" placeholder="Observaciones"><?php echo $observaciones; ?></textarea>
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
                            <label for="int">Nombre Transportista <?php echo form_error('id_encargado_fk') ?></label>
                            <!-- <input type="text" class="form-control" name="id_encargado_fk" id="id_encargado_fk" placeholder="Id Encargado Fk" value="<?php echo $id_encargado_fk; ?>" /> -->
                            <select class="form-control" name="id_encargado_fk" id="id_encargado_fk">
                                <?php
                                echo $optionsEncargado;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="int">Nombre Vendedor <?php echo form_error('id_vendedor_fk') ?></label>
                            <!--<input type="text" class="form-control" name="id_vendedor_fk" id="id_vendedor_fk" placeholder="Id Vendedor Fk" value="<?php echo $id_vendedor_fk; ?>" /> -->
                            <select class="form-control" name="id_vendedor_fk" id="id_vendedor_fk">
                                <?php
                                echo $optionsVendedor;
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('entregas') ?>" class="btn btn-default">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
