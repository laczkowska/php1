<?php

function oblicz($rodzaj, $ilosc, $dodatki){
    include ('6.1DANE.php');
    $cena = 0;
    $cena = $tablicaDanie[$rodzaj]['cena']*$ilosc;
    if(!empty($dodatki)){
        foreach ($dodatki as $a){
            $cena += $a['cena'];
        }
    }
    return $cena;
}