<?php /* copyright© Jhon S. Vique */
class OrderRepository extends Controller {

    function __construct(){
        /** Obtener Modelo para sentencias SQL */
        $this->extendModel('IndexModel');
    }
    /** Funcion para realizar guardado de ordenes usando patron CQRS */
    public function save(Order $order) {
        $result = $this->model->agregarDatos($order);
        return $result;
    }

    public function edit(){

    }

    public function delete(){

    }

    /** Funcion para realizar lectura de ordenes usando patron CQRS */
    public function getAllDataOrders(){
        $orders = $this->model->getOrders();
        return $this->json_response($orders);
    }

    public function getDataOrder(Order $order){
        $order = $this->model->getOrderParam($order->orderId);
        return $this->json_response($order);
    }
}
?>