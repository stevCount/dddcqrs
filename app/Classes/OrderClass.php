<?php /* copyright© Jhon S. Vique */
class Order {
    public $orderId;
    public $customerId;
    public $totalAmount;
    public $orderDescription;
    
    public function __construct($customerId, $totalAmount, $orderDescription, $orderId) {
        $this->orderId = $orderId;
        $this->customerId = $customerId;
        $this->totalAmount = $totalAmount;
        $this->orderDescription = $orderDescription;
    }
}
?>