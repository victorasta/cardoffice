<?php
class UsuarioModel
{
   public function login($correo, $password)
   {
      $stmt = Database::get()->prepare("SELECT U.correo, U.passwrd
      FROM usuario U
      INNER JOIN empleado E
      ON u.id_empleado = E.id
      WHERE U.estado = 'activo'
      AND U.correo = 'admin'");
      #$stmt->bind_param('i', $correo);
      if(!$stmt->execute()){
         return FALSE;
      }
      return ['id' => '0'];
/*       if ($login && $login->num_rows == 1) {
         $usuario = $login->fetch_object();
         if (password_verify($password, $usuario->passwrd)) {
            if (is_null($usuario->id_empleado) && !is_null($usuario->id_cliente)) {
               $sql = "SELECT cl.id as persona ,cl.nombre,cl.apellido ,us.correo,us.id_rol,us.estado, us.id as id_usuario FROM cliente cl,usuario us WHERE us.id_cliente = cl.id AND cl.id ='" . $usuario->id_cliente . "'";
               $login = Database::get()->query($sql);
               $usuario = $login->fetch_object();
               $resultado = $usuario;
            } else {
               $sql = "SELECT em.nombre , us.id_rol , us.estado, em.id as persona FROM empleado em , usuario us WHERE em.id = us.id_empleado and us.id_empleado ='" . $usuario->id_empleado . "'";
               $login = Database::get()->query($sql);
               $usuario = $login->fetch_object();
               $resultado = $usuario;
            }
         }
      } */
      return $resultado;
   }

   public function consultar_items_menu_usuario()
   {
      $qry = "SELECT
       M1.NOMBRE_MODULO,
       M1.URL_MODULO,
       M1.ICONO_MODULO,
       M2.NOMBRE_DEPENDIENTES,
       M2.URL_DEPENDIENTES,
       M2.ICONO_DEPENDIENTES 
    FROM
       MODULO M1
       INNER JOIN V_PERMISOS PM1 ON M1.ID_MODULO = PM1.ID_MODULO
       INNER JOIN usuario U1 ON PM1.ID_ROL = U1.ID_ROL
       LEFT JOIN (
       SELECT
          M.DEPENDENCIA_MODULO,
          GROUP_CONCAT( M.NOMBRE_MODULO ORDER BY M.ID_MODULO SEPARATOR '___' ) 'NOMBRE_DEPENDIENTES',
          GROUP_CONCAT( M.URL_MODULO ORDER BY M.ID_MODULO SEPARATOR '___' ) 'URL_DEPENDIENTES',
          GROUP_CONCAT( M.ICONO_MODULO ORDER BY M.ID_MODULO SEPARATOR '___' ) 'ICONO_DEPENDIENTES' 
       FROM
          MODULO M
          INNER JOIN V_PERMISOS PM2 ON M.ID_MODULO = PM2.ID_MODULO
          INNER JOIN usuario U2 ON PM2.ID_ROL = U2.ID_ROL 
       WHERE
          M.NIVEL_MODULO = 2 
          AND ( PM2.INSERT_PRIV = 'Y' OR PM2.UPDATE_PRIV = 'Y' OR PM2.DELETE_PRIV = 'Y' OR PM2.SELECT_PRIV = 'Y' ) 
          AND U2.id = ? 
       GROUP BY
          M.DEPENDENCIA_MODULO 
       ) M2 ON M1.ID_MODULO = M2.DEPENDENCIA_MODULO 
    WHERE
       M1.NIVEL_MODULO = 1 
       AND ( PM1.INSERT_PRIV = 'Y' OR PM1.UPDATE_PRIV = 'Y' OR PM1.DELETE_PRIV = 'Y' OR PM1.SELECT_PRIV = 'Y' ) 
       AND U1.id = ?";
      $stmt = Database::get()->prepare($qry);
      $id = 1;
      $stmt->bind_param("ii", $id, $id);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
         $dependientes = explode('___', $row['NOMBRE_DEPENDIENTES']);
         echo 'NOMBRE: ' . $row['NOMBRE_MODULO'] . '<BR>';
         foreach ($dependientes as $d) {
            echo 'Dependiente: ' . $d . '<br>';
         }
      }
      $stmt->close();
   }
}
