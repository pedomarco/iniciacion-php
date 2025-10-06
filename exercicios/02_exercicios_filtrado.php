<?php
/*
 * Ejercicios sobre sanitización y validación con filter_var()
 */

//==========================================================
// 1. Sanitización básica de cadenas
//==========================================================

function exercicio1(){
    echo "========== EJERCICIO 1 ==========\n";
    $strings = [
        "<b>Hola</b> mundo",
        "<script>alert('hack');</script> Bienvenido",
        "<h1>Título</h1> con <a href='#'>link</a>"
    ];

    foreach($strings AS $str){
        $sanitizado = strip_tags($str);
        echo "Orixinal: $str\n";
        echo "Sanitizado: $sanitizado\n\n";
    }

}

//==========================================================
// 2. Validar enteros y detectar errores con 0
//==========================================================

function exercicio2(){
    echo "========== EJERCICIO 2 ==========\n";

    $valores = ["123", "0", "abc", -5, 0];

    foreach($valores AS $val){
        $validado = filter_var($val, FILTER_VALIDATE_INT); // -> o valor si e valido ou false
        
        if($validado !== false){
            echo "$val e un enteiro valido\n";
        }else{
            echo "$val NON e un enteiro valido\n";
        }
    }

}

//==========================================================
// 3. Validar direccion IP
//==========================================================

function exercicio3(){
    echo "========== EJERCICIO 3 ==========\n";

    $listaIps = [
                "192.168.1.1",
        "256.100.50.25",
        "127.0.0.1",
        "::1",
        "127.0.0.999"
    ];

    foreach($listaIps as $ip){
        if(filter_var($ip, FILTER_VALIDATE_IP) !== false){
            echo "$ip e unha IP VALIDA\n";
        }else{
            echo "$ip e NON VALIDA\n";
        }
    }

}

//==========================================================
// 4. Sanitizar e validar emails
//==========================================================

function exercicio4(){
    echo "========== EJERCICIO 4 ==========\n";

    $listaEmails = [
        "usuario<script>@gmail.com",
        "correo@@empresa.com",
        "nombre con espacios@correo.com",
        "normal@email.com"        
    ];

    foreach($listaEmails as $email){
        $sanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);
        $eValido = filter_var($sanitizado, FILTER_VALIDATE_EMAIL) !== false;

        echo "Orixinal: $email\n";
        echo "Sanitizado: $sanitizado\n";
        echo "Valido: " . ($eValido ? "SI" : "NON") ."\n\n";
    }

}

//==========================================================
// 5. Sanitizar e validar URLs
//==========================================================

function exercicio5(){
    echo "========== EJERCICIO 5 ==========\n";

    $listaURLs = [
        "http://mi sitio.com/test page",
        "https://ejemplo.com/\nmal",
        "https://google.com"  
    ];

    foreach($listaURLs as $url){
        $sanitizado = filter_var($url, FILTER_SANITIZE_URL);
        $eValido = filter_var($sanitizado, FILTER_SANITIZE_URL) !== false;

        echo "Orixinal: $url\n";
        echo "Sanitizado: $sanitizado\n";
        echo "Valido: " . ($eValido ? "SI" : "NON") ."\n\n";
    }

}

//==========================================================
// 6. Validar enteiro dentro dun rango
//==========================================================
function exercicio6(){
    echo "========== EJERCICIO 6 ==========\n";
    
    $listaValores = [0, 5, 10, 11, -3, "0", "abc", "5"];
    $min = 1;
    $max = 10;

    foreach($listaValores as $valor){
        $validado = filter_var(
            $valor,
            FILTER_VALIDATE_INT,
            ["options" => [
                "min_range" => $min,
                "max_range" => $max
            ]]
        );

        if($validado !== false){
            echo "$valor e un enteiro valido dentro do rango [$min - $max]\n";
        }else{
            echo "$valor NON e un enteiro valido dentro do rango [$min - $max]\n";
        }
    }
}

//exercicio6();

?>