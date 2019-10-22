<?php  

function SendToTrans($queriesPool){
    $db = Database::get();
    try{
        $db->beginTransaction();

        foreach($queriesPool as $query){
            if(!$db->query($query))
                throw new Exception($db->error);
        }
        $db->commit();
    }
    catch(Exception $e){
        $db->query("Insertar $e en tabla de errores");
        $db->rollback();
    }
}

?>