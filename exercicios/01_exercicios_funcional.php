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


echo "=== EJERCICIO 2 ===\n";
$productos = [
    ["nombre" => "Camiseta", "precio" => 15],
    ["nombre" => "Pantalón", "precio" => 30],
    ["nombre" => "Zapatos", "precio" => 50]
];
print_r(productosCaros($productos));
// -> ["Pantalón", "Zapatos"]
echo "\n";

?>


