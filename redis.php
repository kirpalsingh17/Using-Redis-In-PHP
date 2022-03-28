<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require 'Predis/Autoloader.php';
	Predis\Autoloader::register();

	$parameters = 'tcp://127.0.0.1:6379';
	
	$redis = new Predis\Client($parameters);
	
	$redis_key = "SMSAUTH:9876543210";
	$sms_auth_num = sprintf('%04d',mt_rand(1000,9999));
	
	echo $redis_result = $redis->set($redis_key, $sms_auth_num);
	
	echo $redis->expire($redis_key, 180);

	echo $redis->get($redis_key);

?>
