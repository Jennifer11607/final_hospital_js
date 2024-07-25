<?php
require_once 'Conexion.php';

class Especialidad extends Conexion
{
    public $espec_id;
    public $espec_nombre;
    public $espec_situacion;


    public function __construct($args = [])
    {
        $this->espec_id = $args['espec_id'] ?? null;
        $this->espec_nombre = $args['espec_nombre'] ?? '';
        $this->espec_situacion = $args['espec_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO especialidades(espec_nombre) values('$this->espec_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from especialidades where espec_situacion = 1 ";

        if ($this->espec_nombre != '') {
            $sql .= " and espec_nombre like '%$this->espec_nombre%' ";
        }

        if ($this->espec_id != null) {
            $sql .= " and espec_id = $this->espec_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE especialidades SET espec_nombre = '$this->espec_nombre' where espec_id = $this->espec_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE especialidades SET espec_situacion = 0 where espec_id = $this->espec_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
