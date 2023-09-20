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
    // Verificar si se ha proporcionado un número a través de GET
if (isset($_GET['numero'])) {
    // Obtener el número dado a través de GET
    $numeroDado = intval($_GET['numero']);
    
    // Inicializar un contador
    $contador = 1;
    
    // Generar números aleatorios hasta encontrar el primero que sea múltiplo del número dado
    while (true) {
        $numeroAleatorio = rand(1, 100); // Generar un número aleatorio entre 1 y 100
        
        if ($numeroAleatorio % $numeroDado == 0) {
            // Mostrar el número encontrado
            echo "<p>El primer número entero aleatorio múltiplo de $numeroDado es: $numeroAleatorio</p>";
            break;
        }
        
        $contador++;
    }
    
    // Mostrar el número de iteraciones realizadas
    echo "<p>Se realizaron $contador iteraciones para encontrar el número.</p>";
} else {
    // Si no se proporciona un número a través de GET, mostrar un mensaje de error
    echo "<p>No se proporcionó un número a través de GET.</p>";
}
    ?>
    <h2>Ejercicio 3 Con Ciclo Do-While</h2>

<?php
// Verificar si se ha proporcionado un número a través de GET
if (isset($_GET['numero'])) {
    // Obtener el número dado a través de GET
    $numeroDado = intval($_GET['numero']);
    
    // Inicializar un contador
    $contador = 0;
    
    do {
        $contador++;
        $numeroAleatorio = rand(1, 100); // Generar un número aleatorio entre 1 y 100
    } while ($numeroAleatorio % $numeroDado != 0);
    
    // Mostrar el número encontrado
    echo "<p>El primer número entero aleatorio múltiplo de $numeroDado es: $numeroAleatorio</p>";
    
    // Mostrar el número de iteraciones realizadas
    echo "<p>Se realizaron $contador iteraciones para encontrar el número.</p>";
} else {
    // Si no se proporciona un número a través de GET, mostrar un mensaje de error
    echo "<p>No se proporcionó un número a través de GET.</p>";
}
?>

<h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner el valor en cada índice. Es decir:
        [97] => a
        [98] => b
        [99] => c
        ...
        [122] => z
     Crea el arreglo con un ciclo for
     Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach
    foreach ($arreglo as $key => $value) {
    # code...
    } </p>

    <?php
// Crear el arreglo utilizando un ciclo for
$arreglo = array();
for ($i = 97; $i <= 122; $i++) {
    $arreglo[$i] = chr($i);
}

// Crear una tabla XHTML para mostrar el arreglo
echo "<table border='1'>";
foreach ($arreglo as $indice => $letra) {
    echo "<tr>";
    echo "<td>[$indice]</td>";
    echo "<td>$letra</td>";
    echo "</tr>";
}
echo "</table>";
?>

<h2>Ejercicio 5</h2>
    <p>IMPORTANTE: Los siguientes ejercicios deben implementarse en formularios simples de HTML5 (solicitud) y como respuesta devolver un XHTML generado por PHP.
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de bienvenida apropiado. Por ejemplo:
    Bienvenida, usted está en el rango de edad permitido. En caso contrario, deberá devolverse otro mensaje indicando el error.
         Los valores para $edad y $sexo se deben obtener por medio de un formulario en HTML.
         Utilizar el la Variable Superglobal $_POST (revisar documentación). </p>
    </p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Edad: <input type="number" name="edad"><br>
        Sexo: 
        <input type="radio" name="sexo" value="masculino"> Masculino
        <input type="radio" name="sexo" value="femenino"> Femenino<br>
        <input type="submit" value="Enviar">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];
        
        if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
            echo "Bienvenida, usted está en el rango de edad permitido.";
        } else {
            echo "Lo sentimos, no cumple con los requisitos de edad y sexo.";
        }
    }
    ?> 

<h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de una ciudad. Cada vehículo debe ser identificado por:
    <p>
    <ul>
    <li>Matrícula</li>
    <li>
        Auto
        <ul>
            <li>Marca </li>
            <li>Modelo (Año)</li>
            <li>Tipo: (sedán|hatchback|camioneta)</li>
        </ul>
    </li>
    <li>
        Propietario
        <ul>
            <li>Nombre</li>
            <li>Ciudad</li>
            <li>Dirección</li>
        </ul>
    </li>
</ul>
    La matrícula debe tener el siguiente formato LLLNNNN, donde las L pueden ser letras de la A-Z y las N pueden ser números de 0-9.
    <p>Para hacer esto toma en cuenta las siguientes instrucciones:
        <ul>
            <li>Crea en código duro el registro para 15 autos</li>
            <li>Utiliza un único arreglo, cuya clave de cada registro sea la matricula</li>
            <li>Lógicamente la matricula no se puede repetir.</li>
            <li>Los datos del Auto deben ir dentro de un arreglo.</li>
            <li>Los datos del Propietario deben ir dentro de un arreglo.</li>
        </ul>
    </li>
</ul>
Usa print_r para mostrar la estructura general del arreglo, que luciría de forma similar al siguiente ejemplo:

Array ( [UBN6338] => Array ( [Auto] => Array ( [marca] => HONDA [modelo] => 2020 [tipo] => camioneta ) [Propietario] => Array ( [nombre] => Alfonzo Esparza [ciudad] => Puebla, Pue. [direccion] => C.U., Jardines de San Manuel ) ) [UBN6339] => Array ( [Auto] => Array ( [marca] => MAZDA [modelo] => 2019 [tipo] => sedan ) [Propietario] => Array ( [nombre] => Ma. del Consuelo Molina [ciudad] => Puebla, Pue. [direccion] => 97 oriente ) ) )</p>
    </p>
    </p>
    <P>Escrito de forma más ordenada:</P>
    <p>Finalmente crea un formulario simple donde puedas consultar la información:
        <ul>
            <li>Por matricula de auto</li>
            <li>De todos los autos registrados</li>
        </ul></p>

        <!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 6</title>
</head>
<body>
    <h2>Parque Vehicular de Puebla</h2>

    <?php
    // Definir el arreglo asociativo del parque vehicular
    $parqueVehicular = array(
        'UBN6338' => array(
            'Auto' => array(
                'Marca' => 'HONDA',
                'Modelo' => '2020',
                'Tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Alfonzo Esparza',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => 'C.U., Jardines de San Manuel'
            )
        ),
        'UBN6339' => array(
            'Auto' => array(
                'Marca' => 'MAZDA',
                'Modelo' => '2019',
                'Tipo' => 'sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Ma. del Consuelo Molina',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '97 oriente'
            )
        ),
        'XYZ123' => array(
            'Auto' => array(
                'Marca' => 'TOYOTA',
                'Modelo' => '2022',
                'Tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Juan Pérez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '123 Avenida Principal'
            )
        ),
        'ABC456' => array(
            'Auto' => array(
                'Marca' => 'FORD',
                'Modelo' => '2018',
                'Tipo' => 'sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Laura González',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '456 Calle Secundaria'
            )
        ),
        'DEF789' => array(
            'Auto' => array(
                'Marca' => 'CHEVROLET',
                'Modelo' => '2021',
                'Tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Carlos Sánchez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '789 Boulevard Principal'
            )
        ),
        'GHI101' => array(
            'Auto' => array(
                'Marca' => 'NISSAN',
                'Modelo' => '2020',
                'Tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Ana Martínez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '101 Avenida Central'
            )
        ),
        'JKL121' => array(
            'Auto' => array(
                'Marca' => 'VOLKSWAGEN',
                'Modelo' => '2019',
                'Tipo' => 'sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Roberto López',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '121 Calle Secundaria'
            )
        ),
        'MNO141' => array(
            'Auto' => array(
                'Marca' => 'HONDA',
                'Modelo' => '2020',
                'Tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Isabel Pérez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '141 Avenida Principal'
            )
        ),
        'PQR161' => array(
            'Auto' => array(
                'Marca' => 'TOYOTA',
                'Modelo' => '2022',
                'Tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Manuel Rodríguez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '161 Boulevard Principal'
            )
        ),
        'STU181' => array(
            'Auto' => array(
                'Marca' => 'CHEVROLET',
                'Modelo' => '2018',
                'Tipo' => 'sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Patricia García',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '181 Calle Secundaria'
            )
        ),
        'VWX202' => array(
            'Auto' => array(
                'Marca' => 'FORD',
                'Modelo' => '2021',
                'Tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Luis Torres',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '202 Avenida Principal'
            )
        ),
        'YZA222' => array(
            'Auto' => array(
                'Marca' => 'NISSAN',
                'Modelo' => '2020',
                'Tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'María Ramírez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '222 Avenida Central'
            )
        ),
        'BCD242' => array(
            'Auto' => array(
                'Marca' => 'VOLKSWAGEN',
                'Modelo' => '2019',
                'Tipo' => 'sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Jorge Sánchez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '242 Calle Secundaria'
            )
        ),
        'EFG262' => array(
            'Auto' => array(
                'Marca' => 'HONDA',
                'Modelo' => '2020',
                'Tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Ana Pérez',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '262 Avenida Principal'
            )
        ),
        'HIJ282' => array(
            'Auto' => array(
                'Marca' => 'TOYOTA',
                'Modelo' => '2022',
                'Tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Carlos González',
                'Ciudad' => 'Puebla, Pue.',
                'Direccion' => '282 Boulevard Principal'
            )
        )
    );
    
    // Mostrar la estructura general del arreglo utilizando print_r    
    // Mostrar la estructura del arreglo en una sola línea con margen
echo "<h3>Estructura del arreglo en una sola línea con margen:</h3>";
$estructuraEnTexto = json_encode($parqueVehicular);
$estructuraEnTexto = str_replace(['{', '}', '":"', '","', '":["'], ['{ ', ' }', '": "', '", "', '": ['], $estructuraEnTexto);
echo '<pre>' . $estructuraEnTexto . '</pre>';






    // Mostrar la estructura ordenada  del arreglo utilizando print_r
    echo "<h3>Estructura del arreglo ordenada:</h3>";
    echo "<pre>";
    print_r($parqueVehicular);
    echo "</pre>";

    // Procesar la solicitud del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["matricula"])) {
            $matricula = $_POST["matricula"];
            if (array_key_exists($matricula, $parqueVehicular)) {
                // Mostrar información del vehículo con la matrícula especificada
                $vehiculo = $parqueVehicular[$matricula];
                echo "<h3>Información del Vehículo ($matricula):</h3>";
                echo "<pre>";
                print_r($vehiculo);
                echo "</pre>";
            } else {
                echo "<p>La matrícula '$matricula' no se encontró en la base de datos.</p>";
            }
        } elseif (isset($_POST["todos"])) {
            // Mostrar información de todos los vehículos
            echo "<h3>Información de Todos los Vehículos:</h3>";
            echo "<pre>";
            print_r($parqueVehicular);
            echo "</pre>";
        }
    }
    ?>


    <h3>Consultar Información</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="matricula">Buscar por Matrícula:</label>
        <input type="text" name="matricula" id="matricula">
        <input type="submit" value="Buscar">
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="submit" name="todos" value="Mostrar Todos los Vehículos">
    </form>


</body>
</html>