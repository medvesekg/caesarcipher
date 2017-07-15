<?php

function caesar_cipher($string, $key, $spaces = false, $capitals = false) {
    
    
    $letters = array("a","b","c", "č", "d","e","f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "š", "t", "u", "v", "z", "ž","a","b","c", "č", "d","e","f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "š", "t", "u", "v", "z", "ž");
    
    $capital_letters = array("A", "B", "C", "Č", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "Š", "T", "U", "V", "Z", "Ž", "A", "B", "C", "Č", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "Š", "T", "U", "V", "Z", "Ž");
    
    if($spaces == false) {
        $string = str_replace(' ', '', $string);
    }
    
    if($capitals == false) {
    $string = mb_strtolower($string);
    }
    
    $trans = array();
    for($i = 0; $i<=24; $i++) {
        $trans[$letters[$i]] = $letters[$i+$key];
    }
    
    $trans_capital = array ();
    for($i = 0; $i<=24; $i++) {
        $trans_capital[$capital_letters[$i]] = $capital_letters[$i+$key];
    }
    
    $encrypted_string = strtr($string, $trans_capital);
    $encrypted_string = strtr($encrypted_string, $trans);
    return $encrypted_string;
}




function caesar_decipher($string, $key) {
    
    $letters = array("a","b","c", "č", "d","e","f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "š", "t", "u", "v", "z", "ž","a","b","c", "č", "d","e","f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "š", "t", "u", "v", "z", "ž");
    
    $capital_letters = array("A", "B", "C", "Č", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "Š", "T", "U", "V", "Z", "Ž", "A", "B", "C", "Č", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "Š", "T", "U", "V", "Z", "Ž");
    
    $trans = array();
    for($i = 0; $i<=24; $i++) {
        $trans[$letters[$i]] = $letters[25 + $i - $key];
    }
    
    $trans_capital = array ();
    for($i = 0; $i<=24; $i++) {
        $trans_capital[$capital_letters[$i]] = $capital_letters[25+$i-$key];
    }
    
    
    $decrypted_string = strtr($string, $trans);
    $decrypted_string = strtr($decrypted_string, $trans_capital);
    return $decrypted_string;   
}