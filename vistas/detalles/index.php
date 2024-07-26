<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require '../../modelos/Cita.php';
    try {
   
   $fecha = date('d/m/Y');
   $buscar = new Cita();

   $busqueda= $buscar->mostrarInformacion();




    } catch (PDOException $e) {
        $error = $e->getMessage();
    } 
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 table-responsive">
                <table class="table table-bordered" style="font-family:'Courier New', Courier, monospace">
                    <thead>
                        <tr class="text-center table-primary table-bordered rounded border border-primary">
                            <th colspan="6">DETALLE DE CITA</th>
                        </tr>
                    </thead>
                    <tr>
                            <td colspan="6"><center>CITAS PARA EL DIA DE HOY (<?= $fecha?>) </center></td>
                            
                        </tr>

                              
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>
                

                    <?php if( count($busqueda) > 0) { ?>
                        <?php foreach ($busqueda as $key => $opciones) : ?>

                            <tr class="text-center table-success font-weight-bold ">
                            <td colspan="6"><?= $opciones['CLINICA_NOMBRE'] ?>(<?= $opciones['MEDICO_NOMBRE'] ?>)</td>
                            </tr>


                        <td><?= $key +1   ?></td>
                            <td><?= $opciones['PACIENTE_NOMBRE'] ?></td>
                            <td><?= $opciones['PACIENTE_DPI'] ?></td>
                            <td><?= $opciones['PACIENTE_TELEFONO'] ?></td>
                            <td><?= $opciones['CITA_HORA'] ?></td>
                            <td><?= $opciones['CITA_REFERENCIA'] ?></td>
                            <tr>
                               
                        <?php endforeach ?>
                         <tbody>
                       
                 
                  
                        
                         
                        </tr>
                 
                    <?php } ?>;
                    
                       
                        <tr>
                            <td colspan="6"><center>SIN CITAS</center></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php include_once '../../includes/footer.php'?>

    
    
