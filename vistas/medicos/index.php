<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once '../../modelos/Clinica.php';
require_once '../../modelos/Especialidad.php';

    try {
        $especialidad = new Especialidad();
  
        $especialidades = $especialidad->buscar();
   

    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }

 
    try {
        $clinica = new Clinica();
        $clinicas = $clinica->buscar();

    } catch(PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
    
?>



<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: fantasy;">FORMULARIO PARA INGRESAR MEDICOS</h1>
    <div class="row justify-content-center mb-3">
    <form class="col-lg-8 border p-3 " style="background-color: rgba(115, 198, 182 ); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <input type="hidden" name="medico_id" id="medico_id">
    <div class="row mb-3">
        <div class="col text-center">
            <label for="medico_nombre" class="form-label">Nombre del Medico</label>
            <input type="text" name="medico_nombre" id="medico_nombre" class="form-control " required>
        </div>
    </div>

        <div class="row mb-3">
            <div class="col text-center">
            <label for="medico_espec">Especialidad</label>
            <select name="medico_espec" id="medico_espec" class="form-control">
            <option value="">SELECCIONE...</option>
            <?php foreach ($especialidades as $key => $especialidad) : ?>
            <option value="<?= $especialidad['ESPEC_ID'] ?>"><?= $especialidad['ESPEC_NOMBRE'] ?></option>
            <?php endforeach?>
            </select>
            </div>
        </div>

        <div class="row mb-3">
                <div class="col text-center">
                      <label for="medico_clinica">Clinica</label>
                <select name="medico_clinica" id="medico_clinica" class="form-control">
                <option value="">SELECCIONE...</option>
                <?php foreach ($clinicas as $key => $clinica) : ?>
                <option value="<?= $clinica['CLINICA_ID'] ?>"><?= $clinica['CLINICA_NOMBRE'] ?></option>
                <?php endforeach?>
                </select>
                </div>
        </div>

    <div class="row justify-content-center mb-3">
        <div class="col">
            <button type="submit" id="btnGuardar" class="btn btn-primary w-100 rounded-pill"><i class="bi bi-floppy"></i> Guardar</button>
        </div>
        <div class="col">
            <button type="button" id="btnBuscar" class="btn btn-info w-100 rounded-pill"><i class="bi bi-search"></i> Buscar</button>
        </div>
        <div class="col">
            <button type="button" id="btnModificar" class="btn btn-warning w-100 rounded-pill"><i class="bi bi-pencil-square"></i> Modificar</button>
        </div>
        <div class="col">
            <button type="button" id="btnCancelar" class="btn btn-secondary w-100 rounded-pill"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>
        <div class="col">
            <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100 rounded-pill"><i class="bi bi-stars"></i> Limpiar</button>
        </div>
    </div>
</form>

    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Listado de Medicos</h2>
            <table class="table table-bordered table-hover" id="tablaMedicos">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Clinica</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay medicos</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/final_hospital_js/src/js/funciones.js"></script>
<script defer src="/final_hospital_js/src/js/medicos/index.js"></script>
<?php include_once '../../includes/footer.php' ?>

