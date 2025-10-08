<?php
if($_SERVER["REQUEST_METHOD"] === "GET"){
    print_r($_SERVER["REQUEST_METHOD"]);
    echo "<br>";
    // http://localhost:3000/apuntes/04_get_post.php?hola=quetal&id=1234
    echo "Hai unha peticion con metodo GET: ";
    echo "<br>";
    print_r($_GET);
    echo "<br>";

    if (isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT)){
        echo "ID: ". $_GET["id"] . " VALIDO";
    } else {
        echo "ID: ". $_GET["id"] . " NON VALIDO";
    }
} else {
    echo "Non hai peticion GET";
}
echo "<br>";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo "Hai POST";
    echo "<br>";
    print_r($_POST);
} else {
    echo "Non hai POST";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probar GET e POST</title>
</head>
<body>
    <h1>Probar metodo POST</h1>
    <form method="POST">
        <input type = "text" name="hola" required>
        <input type = "number" name="id" placeholder="ID" required>
        <input type = "submit" value="Enviar con POST">

    </form>
    
    <h1>Outras Superglobals</h1>
    <?php echo $_SERVER['HTTP_HOST']?>
    <br>
    <?= $_SERVER['PHP_SELF']?>


</body>
</html>