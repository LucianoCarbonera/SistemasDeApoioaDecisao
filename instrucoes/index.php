<?php

// echo "Ola mundo";


echo calcular(3);
$res=1;

function calcular($fatorial){
    for($n=$fatorial; $n>1; $n--){
        $mult = $n * ($n-1);
        $res = $mult * $res;
        $mult = 0;
    }
    
return $res;
}

?>