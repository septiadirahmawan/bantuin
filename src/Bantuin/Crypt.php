<?php 

namespace Septiadi\Bantuin;

/**
   * Bantuin Crypt
   * @version 1.0
   * @author Septiadi Rahmawan <septiadirahmawan@gmail.com>
   * @link https://github.com/septiadirahmawan/bantuin/
   * @copyright Copyright 2021 Septiadi Rahmawan
   * @package Bantuin
   */

if (!class_exists('Crypt')) {
    class Crypt {
        const AES_ENCRYPT_METHOD = "AES-256-CBC";
        public static function aes_encrypt($string, $secret_key) {
            $permitted_chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $iv                 = substr(str_shuffle($permitted_chars), 0, 16);
            $output             = openssl_encrypt($string, self::AES_ENCRYPT_METHOD, $secret_key, 0, $iv);
            $iv_encoded         = base64_encode($iv);
            $output_fin         = $output.".".$iv_encoded;

            return $output_fin;
        }

        public static function aes_decrypt($string, $secret_key) {
            $payload_arr        = explode(".", $string);

            if(count($payload_arr) != 2)
                return "error format";

            $payload            = $payload_arr[0];
            $iv_encoded         = $payload_arr[1];
            $iv                 = base64_decode($iv_encoded);
            $output             = openssl_decrypt($payload, self::AES_ENCRYPT_METHOD, $secret_key, 0, $iv);

            if(false === $output)
                return "error decrypt false";

            return $output;
        }

        public static function md5($string) {
            return md5($string);
        }

        public static function sha1($string) {
            return sha1($string);
        }
    }
}