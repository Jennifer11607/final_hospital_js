<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once '../../includes/header.php';
include_once '../../includes/navbar.php';
require '../../modelos/Cita.php';
require '../../modelos/Detalle.php';
require '../../modelos/Medico.php';
require '../../modelos/Paciente.php';

try {
    $cita = new Cita($_GET);
    $detalle = new Detalle();
    $medico = new Medico();
    $paciente = new Paciente();
    $citas = $cita->buscar();
    $detalles = $detalle->buscar();
    $medicos = $medico->buscar();
    $pacientes = $paciente->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
//  echo "<pre>";
//  print_r($citas);
//  echo "</pre>";
//  exit;
// Asegúrate de que $citas y $medicos estén definidos como arrays
$citas = $citas ?? [];
$medicos = $medicos ?? [];
$detalles = $detalles ?? [];
$pacientes = $pacientes ??[];
?>
<?php include_once '../../includes/header.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center table-dark">
                        <th colspan="6">DETALLE DE CITAS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="6">
                            <center>
                                CITAS PARA EL DIA DE HOY 
                                (<?= !empty($citas) ? date('d/m/Y', strtotime($citas[0]['CITA_FECHA'])) : '' ?>)
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6">
                            CLINICA DE <?= !empty($medicos) ? $medicos[0]['MEDICO_CLINICA'] : 'N/A' ?> 
                            (<?= !empty($citas) ? $citas[0]['CITA_MEDICO'] : '' ?>)
                        </td>
                    </tr>
                    <tr>
                        <th>NO.</th>
                        <th>PACIENTE</th>
                        <th>DPI</th>
                        <th>TELEFONO</th>
                        <th>HORA DE CITA</th>
                        <th>REFERIDO SI/NO</th>
                    </tr>
                    <?php if (count($citas) > 0): ?>
                        <?php foreach ($citas as $key => $cita) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $cita['PACIENTE_NOMBRE']  ?></td>
                                <td><?= $cita['PACIENTE_DPI'] ?? 'N/A' ?></td>
                                <td><?= $cita['PACIENTE_TELEFONO'] ?? 'N/A' ?></td>
                                <td><?= $cita['CITA_HORA'] ?? 'N/A' ?></td>
                                <td><?= $cita['CITA_REFERENCIA'] ?? 'N/A' ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6"><center>SIN CITAS</center></td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
