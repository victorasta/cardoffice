<?php
class T_Cliente
{
    public static function SendToTrans()
    {
        $db = Database::get();
        $query[] = "INSERT INTO cliente(nombre, apellido, telefono) VALUES('Jairo', 'Nuñez', '123456')";
        $query[] = "SELECT * FROM CLIENTES";
        foreach($query as $q){
            if (!$db->query($q))
            throw new Exception($db->error);
        }
        
    }
}
