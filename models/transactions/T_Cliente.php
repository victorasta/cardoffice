<?php
class T_Cliente
{
    public static function SendToTrans()
    {
        $db = Database::get();
        $query = "INSERT INTO cliente(nombre, apellido, telefono) VALUES('Jairo', 'Nuñez', '123456')";
        if (!$db->query($query))
            throw new Exception($db->error);
        $query = "INSERT INTO cliente(nombre, apellido, telefono) VALUES('Carlos Alexander', 'Guzmán', d'123456')";
        if (!$db->query($query))
            throw new Exception($db->error);
    }
}
