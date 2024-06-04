<?php

class AnyClass
{
    public $data = null;
    public function __construct($data)
    {
        $this->data = $data;
    }

    function __destruct()
    {
        system($this->data);
    }
}

if (file_exists("phar://test.jpeg")) {
    
} else {
    echo 'File not found.';
}
