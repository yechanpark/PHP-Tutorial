<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

// kordate라는 function이 존재하지 않는 경우에만 -> helper는 전역함수이므로
if ( ! function_exists('kordate')){
    // $timestamp는 UNIX_TIMESTAMP값, php에서는 strtotime()의 리턴값이다.
    function kordate($timestamp){
        return date('o년 n월 j일, G시 i분 s초', $timestamp);
    }
}