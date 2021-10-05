<?php 

use Septiadi\Bantuin\Crypt;

if (!function_exists('aes_encrypt')) {
    function aes_encrypt($string, $key) {
        return Crypt::aes_encrypt($string, $key);
    }
}

if (!function_exists('aes_decrypt')) {
    function aes_decrypt($string, $key) {
        return Crypt::aes_decrypt($string, $key);
    }
}