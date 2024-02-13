<?php /* copyright© Jhon S. Vique */
class OrderCommand implements Command {
    private $customerId;
    private $totalAmount;
    private $orderRepository;
    
    public function __construct($customerId = 0, $totalAmount = 0, $orderDescription = '', $orderId = 0, OrderRepository $orderRepository) {
        /** Atributos de la orden */
        $this->customerId = $customerId;
        $this->totalAmount = $totalAmount;
        $this->orderDescription = $orderDescription;

        $this->orderId = $orderId;

        /** Repositorio de la orden Implementando metodos de acceso y modificacion */
        $this->orderRepository = $orderRepository;
    }
    
    public function execute() {
        $order = new Order($this->customerId, $this->totalAmount, $this->orderDescription, $this->orderId);
        $this->orderRepository->save($order);
    }

    public function getallorder(){
        $this->orderRepository->getAllDataOrders();
    }

    public function getorder(){
        $order = new Order($this->orderId,'','','');
        $this->orderRepository->getDataOrder($order);
    }
}
?>