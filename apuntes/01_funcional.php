<?php

$numeros = [1,2,3,4,5];

// --------------- Filter ---------------


// Forma non funcional

$pares = [];
foreach($numeros as $n){
    if ($n % 2 === 0){
        $pares[] = $n;
    }
}

// Usando array_filter
$pares = array_filter(
    $numeros, 
    function($n){
        return $n % 2 === 0;
    }
);

// Notacion simplificada
$pares = array_filter(
    $numeros, 
    fn($numero) => $numero % 2 === 0
);


print_r(array_values($pares)); // array_values para reindexar

// Podo antes definir a funcion

function esPar($n){
    return $n % 2 === 0;
}

$pares = array_filter($numeros, 'esPar');
print_r(array_values($pares));


// Definir a lambda

$eImpar = function($n){
    return $n % 2 !== 0;
};

$impares = array_filter($numeros,$eImpar);
print_r($impares);



// --------------- Map ---------------

$dobleNumeros = array_map(fn($n) => $n * 2, $numeros);
print_r($dobleNumeros);

$letras = ["a", "b"];
$letrasMaiusculas = array_map('strtoupper', $letras);
print_r($letrasMaiusculas);

// --------------- Reduce ---------------
$numeros = [1,2,3,4,5];

$suma =  array_reduce(
    $numeros,
    function($carry, $item) {
        //echo "Carry: $carry, Item: $item \n";
        return $carry + $item;
    },
    1
);

// Notacion simplificada
$suma =  array_reduce(
    $numeros,
    fn ($carry, $item) => $carry + $item,
    0
);


echo "A suma e: $suma";

?>