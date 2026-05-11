<?php
    function random_str( $length = 8 ){
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ' ;
        return substr( str_shuffle( str_repeat( $str, $length )), 0, $length ) ;
    }
?>