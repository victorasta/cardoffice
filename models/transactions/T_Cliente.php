<?php  

function SendToTrans($queriesPool) throws Exception{
    $db = Database::get();
    try{
        $db->beginTransaction();
        
        foreach($queriesPool as $query){
            $db->query($query);
        }

        $db->commit();
    }
    catch(Exception $e){
        $db->query("Insertar $e en tabla de errores")
        $db->rollback();
    }
}

?>