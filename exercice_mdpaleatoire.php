<?php

// $number=0;

//function mdpGenerator($number){
    
//}

//mdpGenerator($number);

/*function random_string($lenght){
    $str=base64_encode($str);
    $str=substr($str,0,$lenght);
    return $str;
    }*/
    
    
    
    //echo rand(1, 20);

function mdpGenerator(){
    $char='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring='';

    for($i=0;$i<10;$i++){
        $randstring=$char[rand(0, strlen($char))];
    }
    return $randstring;
}

mdpGenerator();
echo $randstring;






?>