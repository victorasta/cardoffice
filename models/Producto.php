<?

class producto{
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $id_categoria;
    private $estado;
    private $id_marca;
    private $db;
    
    public function __construct(){
        $this->db=Database::connect();
    }

    function getId(){
        return $this->id;
    }  
    function setId($id){
        $this->id = $id;
    }

    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function getDescripcion(){
        return $this->descripcion;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function getImagen(){
        return $this->imagen;
    }
    function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    function getCategoria(){
        return $this->id_marcas;
    }
    function setCategoria($id_categoria){
        $this->id_categoria = $this->db->real_escape_string($id_categoria);
    }
 
    function getMarca(){
        return $this->id_marcas;
    }
    function setMarca($id_marca){
        $this->id_marca = $this->db->real_escape_string($id_marca);
    }

    function getEstado(){
        return $this->estado;
    }
    function setEstado($estado){
        $this->estado = $this->db->real_escape_string($estado);
    }

}