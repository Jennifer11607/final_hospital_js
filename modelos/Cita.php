<?php
require_once 'Conexion.php';

class Cita extends Conexion
{
    public $cita_id;
    public $cita_paciente;
    public $cita_medico;
    public $cita_fecha;
    public $cita_hora;
    public $cita_referencia;
    public $cita_situacion;


    public function __construct($args = [])
    {
        $this->cita_id = $args['cita_id'] ?? null;
        $this->cita_paciente = $args['cita_paciente'] ?? '';
        $this->cita_medico = $args['cita_medico'] ?? '';
        $this->cita_fecha = $args['cita_fecha'] ?? '';
        $this->cita_hora = $args['cita_hora'] ?? '';
        $this->cita_referencia = $args['cita_referencia'] ?? '';
        $this->cita_situacion = $args['cita_situacion'] ?? '';
    }




    
    public function guardar()
    {
        $sql = "INSERT INTO citas(cita_paciente, cita_medico, cita_fecha, cita_hora, cita_referencia) values('$this->cita_paciente','$this->cita_medico','$this->cita_fecha','$this->cita_hora','$this->cita_referencia')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from citas where cita_situacion = 1 ";

        if ($this->cita_paciente != '') {
            $sql .= " and cita_paciente = '$this->cita_paciente' ";
        }

        if ($this->cita_medico != '') {
            $sql .= " and cita_medico = '$this->cita_medico' ";
        }

        if ($this->cita_fecha != '') {
            $sql .= " and cita_fecha = '$this->cita_fecha' ";
        }
        if ($this->cita_fecha != '') {
            $sql .= " and cita_hora = '$this->cita_hora' ";
        }
        if ($this->cita_fecha != '') {
            $sql .= " and cita_referencia = '$this->cita_referencia' ";
        }

        if ($this->cita_id != null) {
            $sql .= " and cita_id = $this->cita_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE citas SET cita_paciente = '$this->cita_paciente', cita_medico = '$this->cita_medico', cita_fecha = '$this->cita_fecha', cita_hora '$this->cita_hora', cita_referencia '$this->cita_referencia' where cita_id = $this->cita_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE citas SET cita_situacion = 0 where cita_id = $this->cita_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
