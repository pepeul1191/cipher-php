<?php

require 'vendor/autoload.php';
header('x-powered-by: PHP');
header('Server: Ubuntu');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=UTF-8');

class Cipher{
    public static function encode(){
        $key = Flight::request()->query['key'];
        $texto = Flight::request()->query['texto'];
         
         echo base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $texto, MCRYPT_MODE_CBC, md5(md5($key))));
    }
    
    public static function decode(){
        $key = Flight::request()->query['key'];
        $texto = Flight::request()->query['texto'];

        echo rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($texto), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
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