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

echo "=== EJERCICIO 4 ===\n";
$alumnos = [
    ["nombre" => "Ana", "nota" => 7],
    ["nombre" => "Luis", "nota" => 5],
    ["nombre" => "Marta", "nota" => 9]
];
echo promedioNotas($alumnos) . "\n"; 
// -> 7
echo "\n";

?>


