<?php
/**
 * filter_var() para validar e sanitizar data -> mixed
 *  @value: variable que se quere comprobar
 *  @fiter: tipo de comprobacion
 *  */ 

//======================================================================
// SANITIZAR
//======================================================================

$unString = "<h1>Ola mundo </h1>";
$novoString = filter_var($unString, FILTER_SANITIZE_STRING); // deprecado
echo $novoString."\n";
//echo strip_tags($unString); // forma actual
echo "\n";

//======================================================================
// VALIDAR
//======================================================================

/**
 * VALIDATE devolve ->
 *      - mixed: o valor validado si e valido
 *      - false: se a validacion falla 
 * */

/* Validar enteiros */
$int = 0;
var_dump(filter_var($int, FILTER_VALIDATE_INT));

// FORMA INCORRECTA
if(filter_var($int, FILTER_VALIDATE_INT)){
    echo "O enteiro $int e valido";
} else {
    echo "O enteiro $int NON e valido";
}
echo "\n";

// FORMA CORRECTA:

var_dump(!filter_var(0,FILTER_VALIDATE_INT) === false);
var_dump(!filter_var(0,FILTER_VALIDATE_INT) === false || filter_var(0,FILTER_VALIDATE_INT) === 0);
var_dump(filter_var(0,FILTER_VALIDATE_INT) !== false);

$int = "100";
if(filter_var($int,FILTER_VALIDATE_INT) !== false){
    echo "O enteiro $int e valido";
} else {
    echo "O enteiro $int NON e valido";
}
echo "\n";

//-----------------------------------------------------
// Validar unha direccion IP
//-----------------------------------------------------
$ip = "666.0.0.1";

if(filter_var($ip, FILTER_VALIDATE_IP) !== false){
    echo "$ip e unha ip valida";
} else {
    echo "$ip NON e unha ip valida";
}
echo "\n";

//-----------------------------------------------------
// Sanitizar e validar unha direccion email
//-----------------------------------------------------

$casos = [
    "usuario <script> alert() </script>@gmail.com",
    "john@doe@company.com",
    "maria-con espacios@empresa.com",
    "pedro\nlinea@email.com"
];
function sanitizarEmails(array $listaEmails){
    foreach($listaEmails as $email){
        $sanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);
        $eValido = filter_var($sanitizado, FILTER_VALIDATE_EMAIL) !== false;
        echo "Orixinal: $email\n";
        echo "Sanitizado: $sanitizado\n";
        echo "E valido? " . ($eValido? "SI" : "NON") . "\n\n";
    }

};
sanitizarEmails($casos);

//-----------------------------------------------------
// Sanitizar e validar unha URL
//-----------------------------------------------------
$casos = [
  "http://mi sitio.com/pagina con espacios.html",
  "https://example.com/\nnewline",
];

function sanitizarURLs($listaURLs)
{
  foreach ($listaURLs as $url) {
    $sanitized = filter_var($url, FILTER_SANITIZE_URL);
    $isValid = filter_var($sanitized, FILTER_VALIDATE_URL) !== false;

    echo "Original: " . $url . "\n";
    echo "Sanitizado: " . $sanitized . "\n";
    echo "Válido: " . ($isValid ? "SÍ" : "NO") . "\n\n";
  }
}

sanitizarURLs($casos);


//======================================================================
// AVANZADO
//======================================================================


//-----------------------------------------------------
// Validar enteiro dentro dun rango
//-----------------------------------------------------

$int = 0;
$min = 0;
$max = 100;

var_dump(
  filter_var(
    $int,
    FILTER_VALIDATE_INT,
    array(
      "options" => ["min_range" => $min, "max_range" => $max]
    )
  )
);


if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
  echo ("Variable value is not within the legal range");
} else {
  echo ("Variable value is within the legal range");
}

echo "\n\n";

?>