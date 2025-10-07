<?php
/**
 * preg_match($patron, $string) -> 1 ou 0
 * @patron: delimitado por /, #, < ...
 */
$unString = "hola Holas que tal estas";
var_dump(preg_match("/holas/i",$unString)); // /hola/i para case insensitive: Hola, HOLA, ...
echo "\n";

//======================================================================
// EXTREMOS DUN STRING
//======================================================================

// Atopar patron ao princio: ^...
$direccion = "Avenida Calle Cuellar";
if(preg_match("/^calle/i", $direccion)){
    echo "$direccion e unha calle";
} else {
    echo "$direccion NON e unha calle";
}
echo "\n";

// Atopar patron ao final: ...$
$cadena = "Esto es un saludo: hola";
echo preg_match("/hola$/",$cadena)."\n";

// Ter en conta saltos de linha: /m
$direccion = "Calle Cuellar\nCalle Augusta";
echo preg_match_all("/^calle/im",$direccion)."\n";
echo "\n";


//======================================================================
// METACARACTERES
//======================================================================

// Escapalos: \:
$string = "3^4";
echo preg_match("/3\^4/", $string);
echo "\n";

/* [] -> clase */
$string = "hela";
echo preg_match("/h[aeiou]la/", $string);
echo "\n";

// ^ para negar (solo ao principio)
$string = "123456789";
preg_match_all("/[^2468]/", $string, $matches); // $matches: array co econtrado
//print_r($matches);
echo "\n";

// Filtar vocales
$string = "Non coller vogais"; // -> 11
echo preg_match_all("/[^ aeiou]/",$string); // contar consonantes (sin espacios)
echo "\n";

// Metacaracter [-]:
$string = "NON coller MAIUSCULAS solo minusculas";
echo preg_match_all("/[a-z]/",$string);
echo "\n";

$string = "1123456789";
preg_match_all("/[1-3]/",$string,$matches); // gardar en matches os numeros do 1 ao 3
//print_r($matches[0]);
echo "\n";


/* . -> coincide con calquera caracter  \n */
$string = "6\nasd^R\nL";
echo preg_match_all("/./", $string,$matches); // todos os caracteres menos \n
echo "\n";
echo preg_match_all("//", $string, $matches); // todos os caracteres + 1
echo "\n";
echo preg_match_all("/\s/",$string);  // saltos de linha
echo "\n\n";

/* 
 - * -> 0 ou mais ocurrencias do caracter que precede
 - + -> 1 ou mais ocurrencias
 - ? -> 0 ou 1 ocurrencia
*/
$string1 = "hla";
$string2 = "hola";
$string3 = "hoooooola";
echo preg_match("/ho*la/",$string1)."\n";
echo preg_match("/ho+la/",$string1)."\n";
echo preg_match("/ho?la/",$string1)."\n";
echo "\n";
echo preg_match("/ho*la/",$string2)."\n"; // 1
echo preg_match("/ho+la/",$string2)."\n"; // 1
echo preg_match("/ho?la/",$string2)."\n"; // 1
echo "\n";
echo preg_match("/ho*la/",$string3)."\n"; // 1
echo preg_match("/ho+la/",$string3)."\n"; // 1
echo preg_match("/ho?la/",$string3)."\n"; // 0
echo "\n\n";

/* {} -> numero exacto de mathces do caracter ou grupo que o preceden */
$string1 = "hoooola";
$string2 = "hoeila";

echo preg_match("/ho{4}la/",$string1)."\n";
// {n , m} un numero entre n e m ocurrencias
echo preg_match("/ho{2,5}la/",$string1)."\n";
// {n,} como minimo n elementos
echo preg_match("/ho{5,}la/",$string1)."\n";
// Tamen pode ir con clases
echo preg_match("/h[aeiou]{3}/",$string2)."\n";
echo "\n\n";

/* () -> subpatrons dentro de patron */
$string1 = "Llegare pronto que voy volando";
$string2 = "Llegare pronto que voy andando y volando";

echo preg_match_all("/(and|vol)ando/",$string2,$matches)."\n";
//print_r($matches);
echo "\n";
//======================================================================
// SECUENCIAS ESPECIAIS
//======================================================================

$string = "abc123^+*<>";
// Econtrar solo caracteres alfanumericos
echo preg_match_all("/[\w]/",$string,$matches)."\n";
// Todo menos alfanumericos
echo preg_match_all("/[\W]/",$string,$matches)."\n";
// Dixitos
echo preg_match_all("/[\d]/",$string,$matches)."\n";
//print_r($matches);

//======================================================================
// DECLARACIONS
//======================================================================

/*
    - \b -> limite de palabra
    - \B -> non e limite de palabra
*/

$string1 = "Es ahora";
$string2 = "Es la hora";
echo preg_match("/\bhora\b/",$string1)."\n";
echo preg_match("/\bhora\b/",$string2)."\n";
echo preg_match("/\Bhora\b/",$string1)."\n";


//======================================================================
// FUNCIONS
//======================================================================

/* preg_replace */
/* $string = "Vamos a reemplazar la palabra coche";
$cambio = preg_replace("/coche/","moto",$string);
echo $cambio;
echo "\n";

$string = "Vamos a cambiar el animal perro de color verde";
$patrones = ["/perro/","/verde/"];
$sustituciones = ["gato","azul"];
echo preg_replace($patrones, $sustituciones, $string)."\n"; */
?>

