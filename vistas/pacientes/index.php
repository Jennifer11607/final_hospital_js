<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);?>





<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: fantasy;">FORMULARIO PARA INGRESAR PACIENTES</h1>
    <div class="row justify-content-center mb-3">
    <form class="col-lg-8 border p-3 " style="background-color: rgba(115, 198, 182 ); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
    <input type="hidden" name="paciente_id" id="paciente_id">
    <div class="row mb-3">
        <div class="col text-center">
            <label for="paciente_nombre" class="form-label">Nombre del Paciente</label>
            <input type="text" name="paciente_nombre" id="paciente_nombre" class="form-control " required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col text-center">
            <label for="paciente_dpi" class="form-label">No. de DPI</label>
            <input type="text" name="paciente_dpi" id="paciente_dpi" class="form-control " required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col text-center" >
            <label for="paciente_telefono" class="form-label">No. de Telefono</label>
            <input type="text" name="paciente_telefono" id="paciente_telefono" class="form-control" required>
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
            <h2 class="text-center">Listado de Pacientes</h2>
            <table class="table table-bordered table-hover" id="tablaPacientes">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>DPI</th>
                        <th>Telefono</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <ente colspan="5">No hay pacientes</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/final_hospital_js/src/js/funciones.js"></script>
<script defer src="/final_hospital_js/src/js/pacientes/index.js"></script>
<?php include_once '../../includes/footer.php' ?>




