<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>

<h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: impar, par, impar</p>
    <?php
// Función para generar un número aleatorio impar
function generarImpar() {
    return rand(1, 100) * 2 - 1;
}

// Función para generar un número aleatorio par
function generarPar() {
    return rand(1, 100) * 2;
}

// Inicialización de la matriz
$matriz = array();
$iteraciones = 0;
$numerosGenerados = 0;

while (true) {
    $iteraciones++;
    $fila = array();
    
    for ($i = 0; $i < 3; $i++) {
        if ($i % 2 == 0) {
            // Generar número impar
            $numero = generarImpar();
        } else {
            // Generar número par
            $numero = generarPar();
        }
        $fila[] = $numero;
        $numerosGenerados++;
    }
    
    // Verificar si la fila cumple con la condición
    if ($fila[0] % 2 == 1 && $fila[1] % 2 == 0 && $fila[2] % 2 == 1) {
        $matriz[] = $fila;
        break;
    }
}

// Mostrar la matriz resultante
echo "<h2>Matriz Resultante</h2>";
echo "<table border='1'>";
foreach ($matriz as $fila) {
    echo "<tr>";
    foreach ($fila as $numero) {
        echo "<td>$numero</td>";
    }
    echo "</tr>";
}
echo "</table>";

// Mostrar el número de iteraciones y la cantidad de números generados
echo "<p>$numerosGenerados números obtenidos en $iteraciones iteraciones</p>";
?>

<h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado: Crear una variante de este script utilizando el ciclo do-while y El número dado se debe obtener vía GET.</p>
    <?php
    // Obtener el número múltiplo a través de GET
$multiplo = isset($_GET['multiplo']) ? intval($_GET['multiplo']) : 0;

if ($multiplo <= 0) {
    echo "<p>Ingresa un número válido como múltiplo a través de GET.</p>";
} else {
    $encontrado = false;
    $numero = 0;

    while (!$encontrado) {
        $numero = rand(1, 100); // Generar número aleatorio
        
        if ($numero % $multiplo == 0) {
            $encontrado = true;
        }
    }

    echo "<p>El primer número entero múltiplo de $multiplo obtenido aleatoriamente es: $numero</p>";
}


    ?>
    <h2>Ejercicio 3 Con Ciclo Do-While</h2>

<?php
// Obtener el número múltiplo a través de GET
$multiplo = isset($_GET['multiplo']) ? intval($_GET['multiplo']) : 0;

if ($multiplo <= 0) {
    echo "<p>Ingresa un número válido como múltiplo a través de GET.</p>";
} else {
    $encontrado = false;
    $numero = 0;

    do {
        $numero = rand(1, 100); // Generar número aleatorio
        
        if ($numero % $multiplo == 0) {
            $encontrado = true;
        }
    } while (!$encontrado);

    echo "<p>El primer número entero múltiplo de $multiplo obtenido aleatoriamente es: $numero</p>";
}
?>

</body>
</html>