<?php  
class T_Cliente{
public static function SendToTrans(){
    $db = Database::get();
    $db->autocommit(FALSE);
echo '. THREAD_ID DEL MODELO: '.$db->thread_id;
    /* $query = "INSERT INTO cliente(nombre, apellido, telefono) VALUES('Jairo', 'Guzmán', '123456')";
            if(!$db->query($query))
         throw new Exception($db->error);
         $query = "INSERT INTO cliente(nombre, apellido, telefono) VALUES('Jairo', 'Guzmán', '123456')";
         if(!$db->query($query))
      throw new Exception($db->error);
 */}
}
