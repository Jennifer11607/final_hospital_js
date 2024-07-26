<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'Conexion.php';

class Detalle extends Conexion{
    public $detalle_id;
    public $detalle_cita;
    public $detalle_paciente;
    public $detalle_medico;
    public $detalle_situacion;


    public function __construct($args = [] )
    {
        $this->detalle_id = $args['detalle_id'] ?? null;
        $this->detalle_cita = $args['detalle_cita'] ?? '';
        $this->detalle_paciente = $args['detalle_paciente'] ?? '';
        $this->detalle_medico = $args['detalle_medico'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO detalles(detalle_cita, detalle_paciente, detalle_medico) values('$this->detalle_cita','$this->detalle_paciente', '$this->detalle_medico')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from detalles where detalle_situacion = 1 ";

        if ($this->detalle_cita != '') {
            $sql .= " and detalle_cita like '%$this->detalle_cita%' ";
        }

        if ($this->detalle_paciente != '') {
            $sql .= " and detalle_paciente = '$this->detalle_paciente' ";
        }

        if ($this->detalle_medico != '') {
            $sql .= " and detalle_medico = '$this->detalle_medico' ";
        }

        if ($this->detalle_id != null) {
            $sql .= " and detalle_id = $this->detalle_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }
}



   