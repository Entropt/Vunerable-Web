<?php
class AnyClass
{
    private $data;
    private $desc;

    public function __construct($data, $desc)
    {
        $this->data = $data;
        $this->desc = $desc;
    }

    public function __wakeup()
    {
        return new SupportClass($this->data, $this->desc);
    }
}
class SupportClass
{
    private $callable;
    public $newData;

    public function __construct($callable, $data)
    {
        $this->callable = $callable;
        $this->newData = $data;
    }

    public function __destruct()
    {
        @call_user_func($this->callable, $this->newData);
    }
}
