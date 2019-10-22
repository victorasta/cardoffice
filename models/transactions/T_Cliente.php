<?php  
class T_Cliente{
public static function SendToTrans(){
    $db = Database::get();
    $result = $db->query("SELECT @@autocommit");
        $row = $result->fetch_row();
        printf("Autocommit is %s\n", $row[0]);
        $result->free();
    $query = "INSERT INTO cliente(nombre, apellido, telefono) VALUES('Jairo', 'Guzmán', '123456')";
            if(!$db->query($query))
         throw new Exception($db->error);
}
}
