<?php
// show error reporting
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Asia/Manila');
 
// variables used for jwt
$key = "example_key"; // colocar nossa senha para criptografar e descriptografar o token
$iss = "http://example.org"; // Colocar o site onde estará o nosso programa
$aud = "http://example.com"; // Colocar o site onde estará o nosso programa
$iat = 1356999524;
$nbf = 1357000000;
?>