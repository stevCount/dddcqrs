<?php /* copyright© Jhon S. Vique */


class IndexModel{


    protected $_conexion;

    function __construct(){
        try{
            $this->_conexion = new DataBase();

        }catch(Exception $e){
            die();
        }
    }
	
	public function getOrders(){
        try {
            $this->_conexion->consult("SELECT * FROM orders");
            $this->_conexion->execute();
            
            return $this->_conexion->showAll();
        } catch (Exception $e) {
            die($e);
        }
    }

    public function getOrderParam($id){
        try {
            $this->_conexion->consult("SELECT * FROM orders WHERE id = :id");
            $this->_conexion->bind(":id",$id,PDO::PARAM_INT);
            $this->_conexion->execute();
            return $this->_conexion->showAll();
        } catch (Exception $e) {
            die($e);
        }
    }

    public function agregarDatos($datos){
        try {
            $this->_conexion->consult("INSERT INTO orders (description,price,customer_id) VALUES (:description,:price,:customer_id)");
            $this->_conexion->bindParam(":description",$datos->orderDescription);
            $this->_conexion->bindParam(":price",$datos->totalAmount);
            $this->_conexion->bindParam(":customer_id",$datos->customerId);
            return $this->_conexion->execute();
        } catch (Exception $e) {
            die($e);
        }
        return false;
    }

    public function actualizarDatos($datos){
        if(!empty($datos)){
            foreach ($datos as $valDatos) {
                try {
                    $this->_conexion->consult("UPDATE orders SET description = :description , price = :price, customer_id = :customer_id where id = :id");
                    $this->_conexion->bindParam(":id",$valDatos['id']);
                    $this->_conexion->bindParam(":description",$valDatos['description']);
                    $this->_conexion->bindParam(":price",$valDatos['price']);
                    $this->_conexion->bindParam(":customer_id",$valDatos['customer_id']);
                    return $this->_conexion->execute();
                } catch (Exception $e) {
                    die($e);
                }
            }
        }
        return false;
    }

    public function borrarDatos($datos){
        if(!empty($datos)){
            foreach ($datos as $valDatos) {
                try {
                    $this->_conexion->consult("DELETE FROM orders where id = :id");
                    $this->_conexion->bind(":id",$valDatos['id'],PDO::PARAM_INT);
                    return $this->_conexion->execute();
                } catch (Exception $e) {
                    die($e);
                }
            }
        }
        return false;
    }
}
?> 