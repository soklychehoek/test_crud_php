<?php
function randomString($n){
    $character = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str="";
    for($i =0; $i <= $n; $i++){
            $ind = rand(0, strlen($character)-1);
            $str.= $character[$index];
    }
    return $str;
}  
?>