<?php /* copyright© Jhon S. Vique */
class Index extends Controller{

    function __construct(){
        /** Obtener Modelo para sentencias SQL */
        $this->extendModel('IndexModel');

        /** Clases para Dominio, Patron DDD */
        $this->getClass('OrderClass');
        $this->getRepository('OrderRepository');

        $this->getInterface('InterfaceCommand');

        /** Creacion de servicios tipo controlador
         * NOTA: se pueden realizar servicios o usar metodos propios del controlador del patron MVC
         * para este ejercicio se realiza servicios usando la misma logica de los controladores.
         */
        $this->getService('OrderService');

        /** Definicion de comandos y manejadores Usando Patron CQRS */
        $this->getCommand('CommandBus');
        $this->getCommand('OrderCommand');

        $this->commandBus = $commandBus = new CommandBus();
        $this->orderService = $orderService = new OrderService($commandBus);
    }
    
    /** Funcion carga por defecto controlador */
    public function init(){
        $this->view('Index');
    }

    public function obtenerInformacionOrdenes(){
        // Registro de clases para patron CQRS
        $this->commandBus->register(OrderCommand::class, function ($command) {
            $command->getallorder();
        });
        $allOrders = $this->orderService->getAllOrders();
    }

    public function obtenerOrden($id){
        $this->commandBus->register(OrderCommand::class, function ($command) {
            $command->getorder();
        });
        $this->orderService->getOrder($id);
    }

    public function insertarOrden(){

        $this->commandBus->register(OrderCommand::class, function ($command) {
            $command->execute();
        });

        // Ejemplo set de datos para insercion
        $datos = array(
            array(
            'customer_id' => '1',
            'description'=> ' Descripcion Prueba',
            'price' => '200000'
            )
        );

        foreach ($datos as $valDatos) {
            $this->orderService->createOrder("1", 100, 'Orden Descripcion Prueba');
        }

        $this->obtenerInformacionOrdenes();
    }

    // Ejemplo update falta implementacion Patron CQRS
    public function actualizarInformacion(){
        $datos = array(
            array(
                'customer_id' => '1',
                'description'=> ' Descripcion Prueba Modificado',
                'price' => '300000'
            )
        );

        $result = $this->model->actualizarDatos($datos);
        if(!$result){
            echo "Falla actualizar";
        }else{
            $this->listarInformacion();
        }
    }

    // Ejemplo delete falta implementacion Patron CQRS
    public function borrarInformacion(){
        $datos = array(
            array(
                'id' => '5'
            )
        );

        $result = $this->model->borrarDatos($datos);
        if(!$result){
            echo "Falla borrar";
        }else{
            $this->listarInformacion();
        }
    }
}
?>