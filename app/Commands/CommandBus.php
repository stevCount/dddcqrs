<?php /* copyright© Jhon S. Vique */
class CommandBus {
    private $handlers = [];
    
    public function register($commandClassName, $handler) {
        $this->handlers[$commandClassName] = $handler;
    }
    
    public function execute(Command $command) {
        $commandClassName = get_class($command);
        if (isset($this->handlers[$commandClassName])) {
            $handler = $this->handlers[$commandClassName];
            $handler($command);
        } else {
            throw new Exception("No handler registered for command: $commandClassName");
        }
    }
}
?>