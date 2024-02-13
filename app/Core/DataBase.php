<?php /* copyright© Jhon S. Vique */

class DataBase{
    
    private $_db;
    private $_result;

    /**
	 * @access public
	 * Conexión a la base de datos.
	 */

    public function __construct(){
        // Variables de configuracion
        $this->hostname = HOST;
        $this->dbname = DBNAME;
        $this->dbpass = PASSWORD;
        $this->dbuser = USER;

        $this->driverbd = DRIVERBD;
        $this->dbcharset = DBCHARSET;

        try{
            $this->_db = new PDO($this->driverbd.': host='.$this->hostname.'; dbname='.$this->dbname,$this->dbuser,$this->dbpass);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            var_dump($this->driverbd.': host='.$this->hostname.'; dbname='.$this->dbname.'; charset=UTF8',$this->dbuser,$this->dbpass);
            die($e->getMessage());
        }
    }

    public function consult($sql){
        $this->_db->beginTransaction();
        $this->_result = $this->_db->prepare($sql);
    }

    public function execute(){
        try{
            $this->_db->commit();
            return $this->_result->execute();
        }catch(Exception $e){
            $this->_db->rollBack();
            echo "<pre>";
                var_dump(array("error" => $e, "sql" => $this->_result ));
            echo "</pre>";
            die();
        }
    }

    public function bind($param,$value,$type=NULL){
        $this->_result->bindValue($param,$value,$type);
    }

    public function bindParam($param,$value){
        $this->_result->bindParam($param,$value);
    }

    public function show(){
        return $this->_result->fetch(PDO::FETCH_OBJ);
    }

    public function lastId(){
        return $this->_db->lasInsertId();
    }

    public function showAll(){
        return $this->_result->fetchAll(PDO::FETCH_OBJ);
    }

    public function cantidadFilas(){
        $this->_result->rowCount();
    }
}
?>