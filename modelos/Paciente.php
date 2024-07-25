<?php
require_once 'Conexion.php';

class Paciente extends Conexion
{
    public $paciente_id;
    public $paciente_nombre;
    public $paciente_dpi;
    public $paciente_telefono;
    public $paciente_situacion;


    public function __construct($args = [])
    {
        $this->paciente_id = $args['paciente_id'] ?? null;
        $this->paciente_nombre = $args['paciente_nombre'] ?? '';
        $this->paciente_dpi = $args['paciente_dpi'] ?? '';
        $this->paciente_telefono = $args['paciente_telefono'] ?? '';
        $this->paciente_situacion = $args['paciente_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO pacientes(paciente_nombre, paciente_dpi, paciente_telefono) values('$this->paciente_nombre','$this->paciente_dpi','$this->paciente_telefono')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from pacientes where paciente_situacion = 1 ";

        if ($this->paciente_nombre != '') {
            $sql .= " and paciente_nombre like '%$this->paciente_nombre%' ";
        }

        if ($this->paciente_dpi != '') {
            $sql .= " and paciente_dpi like '%$this->paciente_dpi%' ";
        }

        if ($this->paciente_telefono != '') {
            $sql .= " and paciente_telefono = '$this->paciente_telefono' ";
        }

        if ($this->paciente_id != null) {
            $sql .= " and paciente_id = $this->paciente_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE pacientes SET paciente_nombre = '$this->paciente_nombre', paciente_dpi = '$this->paciente_dpi', paciente_telefono = '$this->paciente_telefono' where paciente_id = $this->paciente_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE pacientes SET paciente_situacion = 0 where paciente_id = $this->paciente_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
