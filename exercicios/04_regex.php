<?php
// -----------------------------
// EJERCICIO 1
// Enunciado: Comprobar si una cadena contiene solo dígitos.
// Ejemplo: "12345" -> true, "12a5" -> false
// Salida esperada:
// "12345 es válido"
// "12a5 no es válido"

function exercicio1(){
    $test = ["1234","12f34"];
    foreach($test as $t){
        if(preg_match("/^\d+$/",$t)){
            echo "$t e valido";
        } else {
            echo "$t NON e valido";
        }
        echo "\n";
    }
    
}

// -----------------------------
// EJERCICIO 2
// Enunciado: Validar si un texto contiene solo letras minúsculas.
// Ejemplo: "hola" -> válido, "Hola" -> no válido
function exercicio2(){
    $test = ["holá","Hola"];
    foreach($test as $t){
        if(preg_match("/^[a-záéíóúñ]+$/",$t)){
            echo "$t e valido";
        } else {
            echo "$t NON e valido";
        }
        echo "\n";
    }
    
}

// -----------------------------
// EJERCICIO 3
// Enunciado: Validar si un texto empieza con mayúscula.
// Ejemplo: "Casa" -> válido, "casa" -> no válido
function exercicio3(){
    $test = ["Casa","casa"];
    foreach($test as $t){
        if(preg_match("/^[A-Z]/",$t)){
            echo "$t e valido";
        } else {
            echo "$t NON e valido";
        }
        echo "\n";
    }
 
}
// -----------------------------
// EJERCICIO 4
// Enunciado: Extraer todos los números de una cadena.
// Ejemplo: "Tengo 2 perros y 3 gatos" -> 2, 3
function exercicio4(){
    $text = "Tengo 2 perros y 3 gatos";
    preg_match_all("/\d+/",$text, $matches);
    print_r($matches[0]);
}

// -----------------------------
// EJERCICIO 5
// Enunciado: Comprobar si un correo es válido.
// Ejemplo: "test@mail.com" -> válido Acepta: caracteres alfanumericos,.,_,-
// \w = [A-z0-9_]
function exercicio5(){
    $emails = ["test@mail.com", "badmail@", "otro.do_1@dominio.es","ola@mal","outr@mal.malmal","outr@mal.edu.xunta.gal"];
    foreach($emails as $e){
        echo preg_match("/^[\w\.-]+@[\w\.-]+\.[A-z]{2,3}$/",$e) ? "$e VALIDO\n" : "$e NON VALIDO\n";
    }        
}
// -----------------------------
// EJERCICIO 6
// Enunciado: Validar formato de fecha DD/MM/AAAA.
// Ejemplo: "21/04/2024", "21-04-2024" -> válido
function exercicio6(){
    $dates = ["21/04/2024", "2024-04-21", "21-04-2024", "21.04.2024","21-13-2024"];
    foreach($dates as $d){
        // Acepta datas con guion
        // echo preg_match("#^\d{2}\/\d{2}\/\d{4}#",$d) ? "$d VALIDO\n" : "$d NON VALIDO\n";
        // Acepta puntos
        // echo preg_match("#^\d{2}[\/\-]\d{2}[\/\-]\d{4}#",$d) ? "$d VALIDO\n" : "$d NON VALIDO\n";
        // Acepta meses do 01 ao 12
        // 0 + 1-9 || 1 + 0-2
        echo preg_match("#^\d{2}[\/\-](0[1-9]|1[0-2])[\/\-]\d{4}$#",$d) ? "$d VALIDO\n" : "$d NON VALIDO\n";
    }    
}

// -----------------------------
// EJERCICIO 7
// Enunciado: Sustituir múltiples espacios por uno solo.
// Ejemplo: "Hola    mundo   PHP" -> "Hola mundo PHP"
function exercicio7(){
    $texto = "Hola    mundo   PHP";
    echo preg_replace("/\s+/"," ",$texto);
}

// -----------------------------
// EJERCICIO 8
// Enunciado: Validar si un número de teléfono español (9 dígitos y empieza por 6, 7, 8 y 9).
// Ejemplo: "612345678" -> válido
function exercicio8(){
    $telefonos = ["612345678", "912345678","12345","9123456785"];
        foreach($telefonos as $t){
        echo preg_match("/^[6-9]\d{8}$/",$t) ? "$t VALIDO\n" : "$t NON VALIDO\n";
    }        

}
// -----------------------------
// EJERCICIO 9
// Enunciado: Extraer todas las palabras que empiezan con mayúscula.
// Ejemplo: "Hola Mundo desde PHP" -> Hola, Mundo, PHP
function exercicio9(){
    $text = "Hola Mundo desde PHP";
    preg_match_all("/\b[A-Z][A-z]*\b/",$text,$matches);
    print_r($matches);
    
}
// -----------------------------
// EJERCICIO 10
// Enunciado: Validar una contraseña segura (mín. 8 caracteres, al menos una mayúscula, minúscula, dígito y símbolo).
// Ejemplo: "Abc123$%" -> válido
// Lookahead (?=...) / (?!...)
/* $texto = "Hola. Adios. Hola!";
preg_match_all("/\w+(?=\.)/",$texto,$matches);
print_r($matches); */

function exercicio10(){
    $pass = ["abc12312","Abc123%$"];
    foreach($pass as $p){
        echo preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d])(?=.*\W).{8,}$/",$p) ? "$p VALIDO\n" : "$p NON VALIDO\n";
    }    
}

exercicio10();

?>