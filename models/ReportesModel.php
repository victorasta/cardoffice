<?php

class ReportesModel
{
    private $id;
    private $nombre;
    private $db;

    function __construct()
    { }

    public function consultar_roles()
    {
        $stmt = Database::get()->prepare("SELECT R.ID_ROL, R.NOMBRE_ROL
       FROM rol R
       ORDER BY R.ID_ROL");
        if (!$stmt->execute()) {
            return FALSE;
        }
        $result = $stmt->get_result();
        $roles = array();
        while ($row = $result->fetch_assoc()) {
            $roles[] = array(
                'ID_ROL' => htmlentities($row['ID_ROL'], ENT_QUOTES),
                'NOMBRE_ROL' => htmlentities($row['NOMBRE_ROL'], ENT_QUOTES)
            );
        }
        $result->close();
        return $roles;
    }
    
}
