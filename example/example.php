<?php

require '../vendor/autoload.php';

use Septiadi\Bantuin\Crypt;
use Septiadi\Bantuin\JSON;

$secret_key = "rahasia";

echo Crypt::aes_encrypt("data", $secret_key);
echo "<br><br>";
echo Crypt::aes_decrypt("X+qpswtOhhTS4eAMVg08Sg==.enhoSlJVdXRleVpURHBpZw==", $secret_key);
echo "<br><br>";
echo Crypt::md5($secret_key);
echo "<br><br>";
$a = ['a' => 123];
$b = ['a' => 456];
echo json_encode(JSON::diff($a, $b));
?>