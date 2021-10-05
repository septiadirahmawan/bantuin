<?php 

namespace Septiadi\Bantuin;

/**
   * Bantuin JSON
   * @version 1.0
   * @author Septiadi Rahmawan <septiadirahmawan@gmail.com>
   * @link https://github.com/septiadirahmawan/bantuin/
   * @copyright Copyright 2021 Septiadi Rahmawan
   * @package Bantuin
   */

if (!class_exists('JSON')) {
    class JSON {
        public static function diff($arr1, $arr2) {
            $diff = array();
            foreach( $arr1 as $k1=>$v1 ) {
                if(array_key_exists ($k1, $arr2)) {
                    $v2 = $arr2[$k1];
                    if(is_array($v1) && is_array($v2)) {
                        $changes = self::diff($v1, $v2);
                        if(count($changes) > 0)
                            $diff[$k1] = array('upd' => $changes);
                        unset($arr2[$k1]);
                    }
                    else if($v2 === $v1)
                        unset($arr2[$k1]);
                    else {
                        $diff[$k1] = array('old' => $v1, 'new'=>$v2);
                        unset($arr2[$k1]);
                    }
                }
                else
                    $diff[$k1] = array('old' => $v1);
            }
            reset($arr2);
            foreach( $arr2 as $k=>$v ) {
                $diff[$k] = array('new' => $v);
            }
            return $diff;
        }
    }
}