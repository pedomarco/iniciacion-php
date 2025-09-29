# array_filter
Devuelve un nuevo array solo con los elementos que cumplan la condición.
- $callback → Función que decide si un elemento se mantiene (true) o se descarta (false).

- $mode → Opcional, controla si se pasa la clave también al callback.

- conserva las claves originales, si quieres reindexar, usas array_values($pares)

```php
<?php
$numeros = [1, 2, 3, 4, 5, 6];

// Forma no "funcional"
$pares = [];
foreach ($numeros as $n) {
    if ($n % 2 === 0) {
        $pares[] = $n; // automáticamente reindexa
    }
}

// Filtrar números pares
$pares = array_filter($numeros, function($n) {
    return $n % 2 === 0;
});

// Tambien existe esta sintaxis
$pares = array_filter($numeros, fn($n) => $n % 2 === 0);

// Defino la función antes
function esPar($n) {
    return $n % 2 === 0;
}

// Uso la función como callback
$pares = array_filter($numeros, "esPar");


// Reindexar con array_values
$pares = array_values(
    array_filter($numeros, fn($n) => $n % 2 === 0)
);

print_r($pares);

// Defino una lambda y la guardo en una variable
$esImpar = function($n) {
    return $n % 2 !== 0;
};

// La paso como callback
$impares = array_filter($numeros, $esImpar);
print_r($impares);

?>

```

# array_map
Aplica una función a cada elemento de un array y devuelve un nuevo array con los resultados.
- $callback → La función que se aplica a cada elemento.

- $array → El array de entrada (o varios arrays).

```php
<?php
$numeros = [1, 2, 3, 4, 5];

// Multiplicamos cada número por 2
$resultado = array_map(function($n) {
    return $n * 2;
}, $numeros);

print_r($resultado);
?>

```

# array_reduce

Reduce un array a un único valor, aplicando una función acumuladora:

- $callback recibe dos parámetros:

    - $carry → valor acumulado hasta el momento.

    - $item → valor actual del array.

- $initial → valor inicial del acumulador (opcional).

La función callback recibe siempre dos parámetros.La idea es que recorre el array elemento por elemento y va acumulando un resultado en $carry.

1. $carry → el valor acumulado hasta el momento.

    - Si es la primera vez que entra, vale lo que pusiste como valor inicial (0 en tu ejemplo).

2. $item → el elemento actual del array que está procesando.

```php
<?php
$numeros = [1, 2, 3, 4, 5];

// Sumar todos los elementos
$suma = array_reduce(
    $numeros,
    fn($carry, $item) => $carry + $item,
    0
);

// Para que se vea
$suma = array_reduce(
    $numeros,
    function($carry, $item) {
        echo "Carry: $carry, Item: $item\n";
        return $carry + $item;},
    0);


echo "La suma es: $suma";
?>
```