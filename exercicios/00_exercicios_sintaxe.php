<?php
/* 1. Contar palabras más largas de N caracteres
* Enunciado: Dado un string y un número N, cuenta 
* cuántas palabras tienen más de N caracteres. Usa explode, strlen y bucles.
*/

function countLongWords(string $text, int $n): int {
    $words = explode(" ", $text);
    $count = 0;
    foreach ($words as $word) {
        if (strlen($word) > $n) {
            $count++;
        }
    }
    return $count;
}

echo countLongWords("hola hola que tal",3);
echo "\n";


/*
 * Dado un número de tarjeta "1234567812345678", enmascara todos menos 
 * los últimos 4 dígitos ("************5678"). Usa substr_replace.
 */ 

function maskCard(string $card): string {
    // Calcula cuántos asteriscos necesitamos (todos los dígitos excepto los últimos 4)
    $asteriskCount = strlen($card) - 4;
    
    // Crea una cadena de asteriscos del largo necesario
    $mask = str_repeat("*", $asteriskCount);
    
    // Reemplaza los primeros caracteres (excepto los últimos 4) con asteriscos
    $maskedCard = substr_replace($card, $mask, 0, $asteriskCount);
    return $maskedCard;
    
    //return substr_replace($card, str_repeat("*", strlen($card) - 4), 0, -4);
}

echo maskCard("1234567812345678"); // -> ************5678
echo "\n";

/*
 * Declara constantes MIN_EDAD = 18 y MAX_EDAD = 65. Crea una función que verifique si una edad está en ese rango.
 */ 

const MIN_EDAD = 18;
const MAX_EDAD = 65;

function validarEdad(int $edad): bool {
    return $edad >= MIN_EDAD && $edad <= MAX_EDAD;
}

var_dump(validarEdad(17)); // -> false
echo "\n";

/*
 * Dado un número de mes (1–12), devuelve el trimestre al que pertenece usando switch o match.
 */ 

function getTrimestre(int $mes): string {

/*         switch ($mes) {
        case 1: case 2: case 3: return "Primer trimestre";
        case 4: case 5: case 6: return "Segundo trimestre";
        case 7: case 8: case 9: return "Tercer trimestre";
        case 10: case 11: case 12: return "Cuarto trimestre";
        default: return "Mes inválido";
    }; */

    return match ($mes) {
        1, 2, 3 => "Primer trimestre",
        4, 5, 6 => "Segundo trimestre", 
        7, 8, 9 => "Tercer trimestre",
        10, 11, 12 => "Cuarto trimestre",
        default => "Mes inválido"
    };
}

echo getTrimestre(3); // -> Primer trimestre
echo "\n";

/*
 * Genera la tabla de multiplicar de un número n en un array indexado (hasta 10).
 */ 

function tablaMultiplicar(int $n): array {
    $tabla = [];
    for ($i = 1; $i <= 10; $i++) {
        $tabla[] = "$n x $i = " . ($n * $i);
    }
    return $tabla;
}

print_r(tablaMultiplicar(3)); // -> [ 3 x 1 = 3, ... , 3 x 10 = 30 ]
echo "\n";

/*
 * Dado un array, elimina los duplicados y devuelve cuántos había.
 */ 
function removeDuplicates(array $arr): array {
    $unique = array_unique($arr);
    return ["array" => $unique, "duplicados" => count($arr) - count($unique)];
}

print_r(removeDuplicates(["ola","ola",2,2,3,4,5])); // -> [ array => [ola,2,3,4,5] , duplicados => 2 ]
echo "\n";


/*
 * Dado un string, devuelve un array asociativo con la frecuencia de cada palabra.
 */ 

function wordFrequency(string $text): array {
    $words = explode(" ", strtolower($text));
    $freq = [];
    foreach($words as $word) {
        // null coalescing
        // $freq[$word] = ($freq[$word] ?? 0) + 1;
        
        // Con ternaria
        $freq[$word] = isset($freq[$word]) ? ($freq[$word] + 1) : 1;


/*         if (isset($freq[$word])){
            $freq[$word]++;
        } else {
            $freq[$word] = 1;
        }
 */

    }
    return $freq;
}
print_r(wordFrequency("ola OLA que tal tal tal")); // [ [ola] => 2,  [que] => 1, [tal] => 3]
echo "\n";


/*
 * Crea una función que reciba múltiples strings y devuelva el más largo.
 */ 

function longestString(string ...$strings): string {
    $maxString = "";
    foreach ($strings as $s) {
        if (strlen($s) > strlen($maxString)){
            $maxString = $s;
        }
    }
    return $maxString;

}

echo longestString("ola","ola que tal", "ola que tal tal"); // -> "ola que tal tal"
echo PHP_EOL;

/*
 * Crea una función que imite el comportamiento de array_diff.
 */ 
function customArrayDiff(array $a, array $b): array {
    $output = [];

    foreach($a as $clave => $valor){
        if (!in_array($valor, $b)){
            $output[$clave] = $valor;
        }

    }
    return $output;
}

print_r(customArrayDiff([1,2,3,4],[1,2,3]));
print_r(array_diff([1,2,3,4],[1,2,3]));

?>
