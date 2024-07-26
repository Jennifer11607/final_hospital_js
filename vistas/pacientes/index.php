<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);?>





<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php'?>

<div class="container" style="margin-top: 1cm; width: 29cm; border-radius: 1px;  ">
    <h1 class="text-center" style="font-family: fantasy;">FORMULARIO PARA INGRESAR PACIENTES</h1>
    <div class="row justify-content-center mb-3">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 form-container" >
                <form>
                    <input type="hidden" name="paciente_id" id="paciente_id">
                    <div class="form-group text-center">
                        <label for="paciente_nombre" class="form-label">Nombre del Paciente</label>
                        <input type="text" name="paciente_nombre" id="paciente_nombre" class="form-control " required>
                    </div>
                    <div class="form-group text-center">
                        <label for="paciente_dpi" class="form-label">No. de DPI</label>
                        <input type="text" name="paciente_dpi" id="paciente_dpi" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="paciente_telefono" class="form-label ">No. de Teléfono</label>
                        <input type="text" name="paciente_telefono" id="paciente_telefono" class="form-control mb-2" required>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" id="btnGuardar" class="btn btn-primary btn-block btn-custom "><i class="bi bi-floppy"></i> Guardar</button>
                        </div>
                        <div class="col text-center">
                            <button type="button" id="btnBuscar" class="btn btn-success btn-block btn-custom "><i class="bi bi-search"></i>Buscar</button>
                        </div>
                        <div class="col text-center">
                            <button type="button" id="btnModificar" class="btn btn-warning btn-block btn-custom "><i class="bi bi-pencil-square"> </i>Modificar</button>
                        </div>
                        <div class="col text-center">
                            <button type="button" id="btnCancelar" class="btn btn-secondary btn-block btn-custom "><i class="bi bi-x-lg"></i> Cancelar</button>
                        </div>
                        <div class="col text-center">
                            <button type="reset" id="btnLimpiar" class="btn btn-secondary btn-block btn-custom "><i class="bi bi-stars"></i> Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <td colspan="5">No hay pacientes</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/final_hospital_js/src/js/funciones.js"></script>
<script defer src="/final_hospital_js/src/js/pacientes/index.js"></script>
<?php include_once '../../includes/footer.php' ?>




