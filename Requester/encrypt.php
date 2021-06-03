</<?php  
//Key
$key = md5('Key1234');
$salt = md5('keysalt');

//Encrypt
function encrypt($string, $key){
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	return $string;
}
//Decrypt
function decrypt($string, $key){
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
	return $string;
}

//Hashing Password
function hashword($string, $salt){
	$string = crypt($string, '$1$'. $salt. '$');
	return $string;
}
// or we can use MD5 also
md5();
?>