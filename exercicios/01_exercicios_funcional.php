<?php
/*
/*
 * Ejercicio 1: Dado un array de cadenas, devuelve un array con solo aquellas
 * que sean palíndromos (se leen igual al derecho y al revés).
 * (Usando array_filter)
 */
function filtrarPalindromos(array $palabras): array {
    $palabrasFiltradas = array_filter(
        $palabras,
        fn($p) => strtolower($p) === strtolower(strrev($p))
    );
    return array_values($palabrasFiltradas);
}

echo "=== EJERCICIO 1 ===\n";
print_r(filtrarPalindromos(["oso", "casa", "reconocer", "php", "Ana","adfasdf"]));
// -> ["oso", "reconocer", "Ana"]
echo "\n";


/*
 * Ejercicio 2: Dada una lista de productos con nombre y precio,
 * devuelve un array con los nombres de los productos que cuesten más de 20€.
 * (Usando array_filter + array_map)
 */
function productosCaros(array $productos, float $precioLimite): array {
    $filtrados = array_filter(
        $productos,
        fn($p) => $p['precio'] > $precioLimite
    );
    return array_map(
        fn($p) => $p['nombre'],
        $filtrados
    );
    
}

echo "=== EJERCICIO 2 ===\n";
$productos = [
    ["nombre" => "Camiseta", "precio" => 15],
    ["nombre" => "Pantalón", "precio" => 30],
    ["nombre" => "Zapatos", "precio" => 50]
];
print_r(productosCaros($productos, 25));
// -> ["Pantalón", "Zapatos"]
echo "\n";


/*
 * Ejercicio 3: Dado un array de frases, devuelve un array con el número de palabras
 * de cada frase.
 * (Usando array_map + explode)
 */
function contarPalabrasFrases(array $frases){
    return array_map(
        fn($f) => count(explode(" ",$f)),
        $frases
    );

}

echo "=== EJERCICIO 3 ===\n";
print_r(contarPalabrasFrases([
    "Hola mundo",
    "PHP es divertido",
    "La programación funcional con map filter reduce"
]));
// -> [2, 3, 7]
echo "\n";

/*
 * Ejercicio 4: Dada una lista de estudiantes con sus notas,
 * calcula el promedio de todas las notas.
 * (Usando array_map + array_reduce)
 */
function promedioNotas(array $alumnos){
    $notas = array_reduce(
        $alumnos,
        fn($acc, $estudiante) => $acc + $estudiante['nota'],
        0
    );
/* 
    $listaNotas = array_map(fn($a)=> $a['nota'],$alumnos);
    $media = array_reduce(
        $listaNotas,
        fn($acc, $nota) => $acc + $nota,
        0
     ) / count($alumnos);
      */

    return $notas / count($alumnos);
};

echo "=== EJERCICIO 4 ===\n";
$alumnos = [
    ["nombre" => "Ana", "nota" => 7],
    ["nombre" => "Luis", "nota" => 5],
    ["nombre" => "Marta", "nota" => 9]
];
echo promedioNotas($alumnos) . "\n"; 
// -> 7
echo "\n";


/*
 * Ejercicio 5: Dado un array de strings, devuelve la longitud total de las palabras
 * que tienen más de 3 caracteres.
 */
function longitudPalabrasLargas(array $palabras): int {
    return array_reduce(
        $palabras,
        fn($acc, $p) => strlen($p) > 3 ? $acc + strlen($p) : $acc,
        0
    );

}

echo "=== EJERCICIO 5 ===\n";
echo longitudPalabrasLargas(["sol", "estrella", "luz", "universo"]) . "\n";
// -> 16 (estrella=8, universo=8)
echo "\n";


/*
 * Ejercicio 6: Dado un array de frases, devuelve un array con cada frase invertida palabra por palabra.
 */

function invertirFrases(array $frases){
    return array_map(
        fn($f) => implode(" ",array_reverse(explode(" ",$f))),
        $frases
    );
};

echo "=== EJERCICIO 6 ===\n";
print_r(invertirFrases([
    "hola mundo",
    "php es genial",
    "programacion funcional"
]));
// -> ["mundo hola", "genial es php", "funcional programacion"]
echo "\n";

/*
 * Ejercicio 7: Dado un array de números, devuelve el producto de los impares.
 */
function productoImpares(array $numeros): int {
/*     
    $impares = array_filter($numeros, fn($n) => $n % 2 !== 0);
    return array_reduce(
        $impares,
        fn($acc, $n) => $acc * $n,
        1
    );
 */
    return array_reduce(
        $numeros,
        fn($acc, $n) => $n % 2 !== 0 ? $acc * $n : $acc,
        1
    );

};

echo "=== EJERCICIO 7 ===\n";
echo productoImpares([1, 2, 3, 4, 5]) . "\n"; 
// -> 15 (1*3*5)
echo "\n";

/*
 * Ejercicio 8: Dado un array de cadenas, devuelve un array asociativo
 * donde la clave es la palabra y el valor es su longitud.
 * (Usando array_map + array_combine)
 */

function mapaLongitudes(array $palabras): array {
    $lonxitudes = array_map(fn($p) => strlen($p),$palabras);
    return array_combine($palabras, $lonxitudes);
}

echo "=== EJERCICIO 8 ===\n";
print_r(mapaLongitudes(["php", "programacion", "array", "reduce"]));
// -> ["php"=>3, "programacion"=>12, "array"=>5, "reduce"=>6]
echo "\n";

/*
 * Ejercicio 9: Dada una lista de personas con nombre y edad,
 * devuelve la edad promedio de los mayores de edad.
 */
function promedioMayores(array $personas): float {
/*     
    $suma = 0;
    $count = 0;
    foreach($personas as $p) {
        if ($p['edad'] >= 18){
            $suma += $p['edad'];
            $count++;
        }
    }
    return $count > 0 ? $suma / $count : 0;
 */

    $maoiresIdade = array_filter($personas, fn($p) => $p['edad']>= 18);
    $idades = array_map(fn($p) => $p['edad'],$maoiresIdade);
    $suma = array_reduce(
        $idades,
        fn($acc, $n) => $acc + $n,
        0
    );

    return count($idades) > 0 ? $suma / count($idades) : 0;
}

echo "=== EJERCICIO 9 ===\n";
$personas = [
    ["nombre"=>"Ana","edad"=>17],
    ["nombre"=>"Luis","edad"=>20],
    ["nombre"=>"Marta","edad"=>25]
];
echo promedioMayores($personas) . "\n";
// -> 22.5
echo "\n";

/*
 * Ejercicio 10: Dado un array de palabras, devuelve la palabra más larga.
 */

echo "=== EJERCICIO 10 ===\n";
echo palabraMasLarga(["sol", "estrella", "galaxia", "universo"]) . "\n";
// -> universo
echo "\n";
?>


