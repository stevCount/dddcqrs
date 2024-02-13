<?php /* copyright© Jhon S. Vique */
class OrderService {
    private $commandBus;
    
    public function __construct(CommandBus $commandBus) {
        $this->commandBus = $commandBus;
    }
    
    public function createOrder($customerId, $totalAmount, $orderDescription) {
        $command = new OrderCommand($customerId, $totalAmount, $orderDescription,'',new OrderRepository());
        $this->commandBus->execute($command);
    }

    public function getAllOrders() {
        $command = new OrderCommand('','','','',new OrderRepository());
        $this->commandBus->execute($command);
    }
    
    public function getOrder($id) {
        $command = new OrderCommand('','','',$id,new OrderRepository());
        $this->commandBus->execute($command);
    }
}
?>