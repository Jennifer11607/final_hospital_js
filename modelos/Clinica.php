<?php
require_once 'Conexion.php';

class Clinica extends Conexion
{
    public $clinica_id;
    public $clinica_nombre;
    public $clinica_situacion;


    public function __construct($args = [])
    {
        $this->clinica_id = $args['clinica_id'] ?? null;
        $this->clinica_nombre = $args['clinica_nombre'] ?? '';
        $this->clinica_situacion = $args['clinica_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO clinicas(clinica_nombre) values('$this->clinica_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from clinicas where clinica_situacion = 1 ";

        if ($this->clinica_nombre != '') {
            $sql .= " and clinica_nombre like '%$this->clinica_nombre%' ";
        }

        if ($this->clinica_id != null) {
            $sql .= " and clinica_id = $this->clinica_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE clinicas SET clinica_nombre = '$this->clinica_nombre' where clinica_id = $this->clinica_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE clinicas SET clinica_situacion = 0 where clinica_id = $this->clinica_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
