<?php
// Due to changes in signature of log() method (one with return type declared,
// the other with no return type declared) we adapt which class is actually
// included based on the signature of \Psr\Log\AbstractLogger included by
// Composer.
$reflection = new \ReflectionClass('\Psr\Log\AbstractLogger');
$return_type = $reflection->getMethod('log')->getReturnType();
if (empty($return_type)) {
	include __DIR__ . "/psr-log-2/TestLogger.php";
}
else {
	include __DIR__ . "/psr-log-3/TestLogger.php";
}
