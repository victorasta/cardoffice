<?php

class CategoriaModel
{
    function __construct()
    { }
    public function consultar_categorias()
    {
        $stmt = Database::get()->prepare("SELECT C.ID_CATEGORIA, C.NOMBRE_CATEGORIA, C.ESTADO_CATEGORIA
       FROM categoria C
       ORDER BY C.NOMBRE_CATEGORIA");
        if (!$stmt->execute()) {
            return FALSE;
        }
        $result = $stmt->get_result();
        $categorias = array();
        while ($row = $result->fetch_assoc()) {
            $categorias[] = array(
                'ID_CATEGORIA' => htmlentities($row['ID_CATEGORIA'], ENT_QUOTES),
                'NOMBRE_CATEGORIA' => htmlentities($row['NOMBRE_CATEGORIA'], ENT_QUOTES),
                'ESTADO_CATEGORIA' => htmlentities($row['ESTADO_CATEGORIA'], ENT_QUOTES)
            );
        }
        $result->close();
        return $categorias;
    }
    public function consultar_categoria($id_categoria)
    {
        $stmt = Database::get()->prepare("SELECT C.ID_CATEGORIA, C.NOMBRE_CATEGORIA, C.ESTADO_CATEGORIA
       FROM categoria C
       WHERE C.ID_CATEGORIA = ?");
        $stmt->bind_param('i', $id_categoria);
        if (!$stmt->execute()) {
            return FALSE;
        }
        $result = $stmt->get_result();
        if ($result->num_rows == 0 || $result->num_rows > 1)
            $categoria = FALSE;
        else
            $categoria = $result->fetch_object();
        $result->close();
        return $categoria;
    }
    public function eliminar_categoria($id_categoria)
    {
        if (!$stmt = Database::get()->prepare("DELETE FROM categoria WHERE ID_CATEGORIA = ?"))
            throw new Exception(Database::get()->error);
        if (!$stmt->bind_param('i', $id_categoria))
            throw new Exception(Database::get()->error);
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            throw new Exception(Database::get()->error);
        }
    }
    public function insertar_categoria($nombre_categoria, $estado_categoria)
    {
        if (!$stmt = Database::get()->prepare("INSERT INTO categoria (NOMBRE_CATEGORIA, ESTADO_CATEGORIA) VALUES(? , ?)"))
            throw new Exception(Database::get()->error);
        if (!$stmt->bind_param('ss', $nombre_categoria, $estado_categoria))
            throw new Exception(Database::get()->error);
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            throw new Exception(Database::get()->error);
        }
    }
    public function actualizar_categoria($id_categoria, $nombre_categoria, $estado_categoria)
    {
        if (!$stmt = Database::get()->prepare("UPDATE categoria SET NOMBRE_CATEGORIA = ?, ESTADO_CATEGORIA = ? WHERE ID_CATEGORIA = ?"))
            throw new Exception(Database::get()->error);
        if (!$stmt->bind_param('ssi', $nombre_categoria, $estado_categoria, $id_categoria))
            throw new Exception(Database::get()->error);
        if (!$stmt->execute() || $stmt->affected_rows == 0) {
            throw new Exception(Database::get()->error);
        }
    }
}
