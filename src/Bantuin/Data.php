<?php 

namespace Septiadi\Bantuin;

/**
   * Bantuin Data
   * @version 1.0
   * @author Septiadi Rahmawan <septiadirahmawan@gmail.com>
   * @link https://github.com/septiadirahmawan/bantuin/
   * @copyright Copyright 2021 Septiadi Rahmawan
   * @package Bantuin
   */

if (!class_exists('Data')) {
    class Data {
        public static function provinsi($cari = NULL) {
            $output = [];
            $json = file_get_contents("../assets/json/provinsi.json");
            $data = json_decode($json, true)['RECORDS'];
            if(isset($cari) && is_numeric($cari)) {
                $i = 0;
                foreach ($data as $key => $value) {
                    if($data[$i]['NO_PROP'] == $cari) {
                        $output[] = $data[$i];
                    }
                    $i++;
                }
            }
            else if(isset($cari) && !is_numeric($cari)) {
                $i = 0;
                foreach ($data as $key => $value) {
                    if (strpos($data[$i]['NAMA_PROP'], strtoupper($cari)) !== false) {
                        $output[] = $data[$i];
                    }
                    $i++;
                }
            }
            else
                $output = $data;
            
            return $output;
        }
    }
}