<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
?>

<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style=" font-family: fantasy;">FORMULARIO PARA INGRESAR CLINCAS</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border p-3 " style=" font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
            <input type="hidden" name="clinica_id" id="clinica_id">
            <div class="row mb-3">
                <div class="col text-center">
                    <label for="clinica_nombre" class="form-label">Nombre de la Clinica</label>
                    <input type="text" name="clinica_nombre" id="clinica_nombre" class="form-control " required>
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
            <h2 class="text-center">Listado de Especialidades</h2>
            <table class="table table-bordered table-hover" id="tablaClinicas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre de la Clinica</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay pacientes</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/final_hospital_js/src/js/funciones.js"></script>
<script defer src="/final_hospital_js/src/js/clinicas/index.js"></script>
<?php include_once '../../includes/footer.php' ?>