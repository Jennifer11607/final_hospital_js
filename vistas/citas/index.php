<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../modelos/Paciente.php';
require_once '../../modelos/Medico.php';

try {
    $paciente = new Paciente();
    $medico = new Medico();
    $pacientes = $paciente->buscar();
    $medicos = $medico->buscar();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
    
?>

<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: fantasy;">FORMULARIO PARA INGRESAR CITAS</h1>
    <div class="row justify-content-center mb-3">
    <form class="col-lg-8 border p-3 " style="background-color: rgba(115, 198, 182 ); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <input type="hidden" name="cita_id" id="cita_id">
    <div class="row mb-3">
                    <div class="col text-center">
                        <label for="cita_paciente">Nombre del paciente</label>
                        <select name="cita_paciente" id="cita_paciente" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($pacientes as $key => $paciente) : ?>
                                <option value="<?= $paciente['PACIENTE_ID'] ?>"><?= $paciente['PACIENTE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-center">
                        <label for="cita_medico">Medico asignado</label>
                        <select name="cita_medico" id="cita_medico" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($medicos as $key => $medico) : ?>
                                <option value="<?= $medico['MEDICO_ID'] ?>"><?= $medico['MEDICO_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>

            <div class="row mb-3">
                        <div class="col text-center">
                            <label for="cita_fecha">Fecha de la cita</label>
                            <input type="date" value="<?= date('m-d-Y') ?>" name="cita_fecha" id="cita_fecha" class="form-control">
                        </div>
                    </div>

                <div class="row mb-3">
                    <div class="col text-center">
                        <label for="cita_hora">Horario</label>
                        <input type="time" value="<?= date('H:i') ?>" name="cita_hora" id="cita_hora" class="form-control">
                    </div>
                </div>        

                 <div class="row mb-3">
                    <div class="col text-center">
                        <label for="cita_referencia">¿Tiene referencia? </label>
                        <select name="cita_referencia" id="cita_referencia" class="form-control">
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </div>
                </div>

    <div class="row justify-content-center mb-3">
        <div class="col">
            <button type="submit" id="btnGuardar" class="btn btn-primary w-100 rounded-pill">Guardar</button>
        </div>
        <div class="col">
            <button type="button" id="btnBuscar" class="btn btn-info w-100 rounded-pill">Buscar</button>
        </div>
        <div class="col">
            <button type="button" id="btnModificar" class="btn btn-warning w-100 rounded-pill">Modificar</button>
        </div>
        <div class="col">
            <button type="button" id="btnCancelar" class="btn btn-secondary w-100 rounded-pill">Cancelar</button>
        </div>
        <div class="col">
            <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100 rounded-pill">Limpiar</button>
        </div>
    </div>
</form>

    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Listado de Citas</h2>
            <table class="table table-bordered table-hover" id="tablaCitas">
                <thead>
                    <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>MÉDICO</th>
                            <th>FECHA CITA</th>
                            <th>HORA</th>
                            <th>REFERIDO</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay citas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/final_hospital_js/src/js/funciones.js"></script>
<script defer src="/final_hospital_js/src/js/citas/index.js"></script>
<?php include_once '../../includes/footer.php' ?>

