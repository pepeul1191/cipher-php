<?php

require 'vendor/autoload.php';
header('x-powered-by: PHP');

class Cipher{
    public static function encode(){
    		$key = Flight::request()->query['key'];
    		$texto = Flight::request()->query['texto'];
    		$securekey = hash('sha256',$key,TRUE);
        $iv = mcrypt_create_iv(16);

        echo base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $securekey, $texto, MCRYPT_MODE_ECB, $iv));
    }
    
    public static function decode(){
    		$key = Flight::request()->query['key'];
    		$texto = Flight::request()->query['texto'];
    		$securekey = hash('sha256',$key,TRUE);
        $iv = mcrypt_create_iv(16);

        echo trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $securekey, base64_decode($texto), MCRYPT_MODE_ECB, $iv));
    }

    public static function key(){
    		$length = 13;
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    echo $randomString;
    }
}

Flight::route('GET /key', array('Cipher','key'));
Flight::route('POST /encode', array('Cipher','encode'));
Flight::route('POST /decode', array('Cipher','decode'));

Flight::start();

?>