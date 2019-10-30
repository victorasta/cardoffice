<?php
class UsuarioModel
{
   public function consultar_usuario($correo, $modulo = FALSE, $priv = FALSE)
   {
      if ($modulo !== FALSE && $priv !== FALSE) {
         $qry = "SELECT U.id
         FROM usuario U
         INNER JOIN empleado E
         ON U.id_empleado = E.id
         INNER JOIN rol R
         ON R.ID_ROL = U.id_rol
         INNER JOIN V_PERMISOS P
         ON R.ID_ROL = P.ID_ROL
         INNER JOIN modulo M
         ON P.ID_MODULO = M.ID_MODULO
         WHERE
         U.id = ?
         AND M.ID_MODULO = ?
         AND U.estado = 'activo'
         AND ";
         switch ($priv) {
            case INSERT_PRIV:
               $qry .= "P.INSERT_PRIV = 'Y' ";
               break;
            case UPDATE_PRIV:
               $qry .= "P.UPDATE_PRIV = 'Y' ";
               break;
            case DELETE_PRIV:
               $qry .= "P.DELETE_PRIV = 'Y' ";
               break;
            case SELECT_PRIV:
               $qry .= "P.SELECT_PRIV = 'Y' ";
               break;
         }
         $stmt = Database::get()->prepare($qry);
         $stmt->bind_param('ii', $correo, $modulo);
      } else {
         $qry = "SELECT U.id, U.correo, U.passwrd
         FROM usuario U
         INNER JOIN empleado E
         ON U.id_empleado = E.id
         INNER JOIN rol R
         ON R.ID_ROL = U.id_rol
         WHERE U.estado = 'activo'
         AND U.correo = ?";
         $stmt = Database::get()->prepare($qry);
         $stmt->bind_param('s', $correo);
      }
      if (!$stmt->execute()) {
         return FALSE;
      }
      $result = $stmt->get_result();
      if ($result->num_rows < 1)
         return FALSE;
      return $result->fetch_object();
   }
   public function consultar_informacion_usuario()
   {
      if (!isset($_SESSION['ID_USUARIO']) || trim($_SESSION['ID_USUARIO']) == '') {
         return FALSE;
      }
      $stmt = Database::get()->prepare("SELECT U.id, E.nombre, E.apellido, 
      FROM usuario U
      INNER JOIN empleado E
      ON u.id_empleado = E.id
      WHERE U.estado = 'activo'
      AND U.id = ?");
      $stmt->bind_param('i', $_SESSION['ID_USUARIO']);
      if (!$stmt->execute()) {
         return FALSE;
      }
      return $stmt->get_result()->fetch_object();
   }

   public function consultar_items_menu_usuario($id_usuario)
   {
      $qry = "SELECT
      M1.NOMBRE_MODULO,
      M1.URL_MODULO,
      M1.ICONO_MODULO,
      IFNULL(M2.NOMBRE_DEPENDIENTES, '') 'NOMBRE_DEPENDIENTES',
      IFNULL(M2.URL_DEPENDIENTES, '')'URL_DEPENDIENTES',
      IFNULL(M2.ICONO_DEPENDIENTES, '') 'ICONO_DEPENDIENTES' 
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
      $stmt->bind_param("ii", $id_usuario, $id_usuario);
      $stmt->execute();
      $result = $stmt->get_result();
      $modulos = array();
      while ($row = $result->fetch_assoc()) {
         $modulos[] = array(
            'NOMBRE_MODULO' => $row['NOMBRE_MODULO'],
            'URL_MODULO' => $row['URL_MODULO'],
            'ICONO_MODULO' => $row['ICONO_MODULO'],
            'NOMBRE_DEPENDIENTES' => $row['NOMBRE_DEPENDIENTES'],
            'URL_DEPENDIENTES' => $row['URL_DEPENDIENTES'],
            'ICONO_DEPENDIENTES' => $row['ICONO_DEPENDIENTES']
         );
      }
      $stmt->close();
      return $modulos;
   }
}
