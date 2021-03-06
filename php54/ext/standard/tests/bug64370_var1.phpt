--TEST--
Test bug #64370 microtime(true) less than $_SERVER['REQUEST_TIME_FLOAT'] 
--SKIPIF--
<?php
	if (PHP_MAJOR_VERSION < 5 || (PHP_MAJOR_VERSION == 5 && PHP_MINOR_VERSION < 4)) {
		die('skip PHP 5.4+ only');
	}
--FILE--
<?php
echo "\$_SERVER['REQUEST_TIME']: {$_SERVER['REQUEST_TIME']}\n";
echo "\$_SERVER['REQUEST_TIME_FLOAT']: {$_SERVER['REQUEST_TIME_FLOAT']}\n";
echo "time(): " . time() . "\n";
echo "microtime(true): " . microtime(true) . "\n";
$d = (microtime(true)-$_SERVER['REQUEST_TIME_FLOAT'])*1000;
echo "created in $d ms\n";
echo ((bool)($d >= 0)) . "\n";
?>
===DONE===
--EXPECTF--
$_SERVER['REQUEST_TIME']: %d
$_SERVER['REQUEST_TIME_FLOAT']: %f
time(): %d
microtime(true): %f
created in %f ms
1
===DONE===
