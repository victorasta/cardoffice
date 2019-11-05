<?php

class MarcaModel
{
    private $id;
    private $nombre;
    private $estado;
    private $db;

    function __construct()
    { }
    public function consultar_marcas()
    {
        $stmt = Database::get()->prepare("SELECT M.ID_MARCA, M.NOMBRE_MARCA, M.ESTADO_MARCA
       FROM marca M
       ORDER BY M.NOMBRE_MARCA");
        if (!$stmt->execute()) {
            return FALSE;
        }
        $result = $stmt->get_result();
        $marcas = array();
        while ($row = $result->fetch_assoc()) {
            $marcas[] = array(
                'ID_MARCA' => htmlentities($row['ID_MARCA'], ENT_QUOTES),
                'NOMBRE_MARCA' => htmlentities($row['NOMBRE_MARCA'], ENT_QUOTES),
                'ESTADO_MARCA' => htmlentities($row['ESTADO_MARCA'], ENT_QUOTES)
            );
        }
        $result->close();
        return $marcas;
    }
    public function consultar_marca($id_marca)
    {
        $stmt = Database::get()->prepare("SELECT M.ID_MARCA, M.NOMBRE_MARCA, M.ESTADO_MARCA
       FROM marca M
       WHERE M.ID_MARCA = ?");
        $stmt->bind_param('i', $id_marca);
        if (!$stmt->execute()) {
            return FALSE;
        }
        $result = $stmt->get_result();
        if ($result->num_rows == 0 || $result->num_rows > 1)
            $marca = FALSE;
        else
            $marca = $result->fetch_object();
        $result->close();
        return $marca;
    }
    public function eliminar_marca($id_marca)
    {
        if (!$stmt = Database::get()->prepare("DELETE FROM marca WHERE ID_MARCA = ?"))
            throw new Exception(Database::get()->error);
        if (!$stmt->bind_param('i', $id_marca))
            throw new Exception(Database::get()->error);
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            throw new Exception(Database::get()->error);
        }
    }
    public function insertar_marca($nombre_marca, $estado_marca)
    {
        if (!$stmt = Database::get()->prepare("INSERT INTO marca (NOMBRE_MARCA, ESTADO_MARCA) VALUES(? , ?)"))
            throw new Exception(Database::get()->error);
        if (!$stmt->bind_param('ss', $nombre_marca, $estado_marca))
            throw new Exception(Database::get()->error);
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            throw new Exception(Database::get()->error);
        }
    }
    public function actualizar_marca($id_marca, $nombre_marca, $estado_marca)
    {
        if (!$stmt = Database::get()->prepare("UPDATE marca SET NOMBRE_MARCA = ?, ESTADO_MARCA = ? WHERE ID_MARCA = ?"))
            throw new Exception(Database::get()->error);
        if (!$stmt->bind_param('ssi', $nombre_marca, $estado_marca, $id_marca))
            throw new Exception(Database::get()->error);
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            throw new Exception(Database::get()->error);
        }
    }

    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }

    function getNombre()
    {
        return $this->nombre;
    }
    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function getEstado()
    {
        return $this->estado;
    }
    function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }
}
