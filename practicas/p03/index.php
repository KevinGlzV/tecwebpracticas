<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Practica 3: Manejo de variables con PHP</h2>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida

        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '</ul>';

    ?>
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;</p>
    <?php
    $a = "ManejadorSQL";
    $b = 'MySQL';
    
    $c = &$a;

    echo '<ul>';
    echo '<li>Variable a: ' . $a . '</li>';
    echo '<li>Variable b: ' . $b . '</li>';
    echo '<li>Variable c: ' . $c . '</li>';
    echo '</ul>';
    
    echo 'Ahora agrega las siguientes lineas y muestra el contenido: ';
    echo '$a = “PHP server”;';
    echo '$b = &$a;';

    $a = "PHP server";
    $b = &$a;

    echo '<ul>';
    echo '<li>Variable a: ' . $a . '</li>';
    echo '<li>Variable b: ' . $b . '</li>';
    echo 'Lo que paso en el segundo bloque, es que la variable b esta haciendo referencia a la variable a, por lo que tendran el mismo valor';
    echo '</ul>'
    
?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglo):</p>
    <p>$a = “PHP5”;
    $z[] = &$a;
    $b = “5a version de PHP”;
    $c = $b*10;
    $a .= $b;
    $b *= $c;
    $z[0] = “MySQL”;</p>


    <h2>Ejercicio 3</h2>
<p>Muestra el contenido de cada variable inmediatamente después de cada asignación, verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglos):</p>
<p>$a = “PHP5”;
$z[] = &$a;
$b = “5a version de PHP”;
$c = $b*10;
$a .= $b;
$b *= $c;
$z[0] = “MySQL”;</p>

<?php
$a = "PHP5";
$z[] = &$a;

echo '<ul>';
echo '<li>Después de $a = "PHP5": a = ' . $a . '</li>';
echo '<li>Después de $z[] = &$a: z[0] = ' . $z[0] . '</li>';
echo '</ul>';

$b = "5a version de PHP";

echo '<ul>';
echo '<li>Después de $b = "5a version de PHP": b = ' . $b . '</li>';
echo '</ul>';

@$c = $b * 10;

echo '<ul>';
echo '<li>Después de $c = $b * 10: c = ' . $c . '</li>';
echo '</ul>';

$a .= $b;

echo '<ul>';
echo '<li>Después de $a .= $b: a = ' . $a . '</li>';
echo '</ul>';

$b *= $c;

echo '<ul>';
echo '<li>Después de $b *= $c: b = ' . $b . '</li>';
echo '</ul>';

$z[0] = "MySQL";

echo '<ul>';
echo '<li>Después de $z[0] = "MySQL": z[0] = ' . $z[0] . '</li>';
echo '</ul>';
?>

<h2>Ejercicio 4</h2>
<p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP.</p>

<?php
// Utilizando $GLOBALS
echo '<h3>Usando $GLOBALS</h3>';
echo '<ul>';
echo '<li>$a = ' . $GLOBALS['a'] . '</li>';
echo '<li>$b = ' . $GLOBALS['b'] . '</li>';
echo '<li>$c = ' . $GLOBALS['c'] . '</li>';
echo '<li>$z[0] = ' . $GLOBALS['z'][0] . '</li>';
echo '</ul>';

// Utilizando el modificador global
global $a, $b, $c, $z;
echo '<h3>Usando el modificador global</h3>';
echo '<ul>';
echo '<li>$a = ' . $a . '</li>';
echo '<li>$b = ' . $b . '</li>';
echo '<li>$c = ' . $c . '</li>';
echo '<li>$z[0] = ' . $z[0] . '</li>';
echo '</ul>';
?>

<h2>Ejercicio 5</h2>
<p>Dar el valor de las variables $a, $b, $c al final del siguiente script:
$a = “7 personas”;
$b = (integer) $a;
$a = “9E3”;
$c = (double) $a;</p>

<?php
$a = "7 personas";
$b = (integer) $a;
$a = "9E3";
$c = (double) $a;

echo "Valor de \$a: $a<br>";
echo "Valor de \$b: $b<br>";
echo "Valor de \$c: $c<br>";
?>

<h2>Ejercicio 6</h2>
<p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(<datos>).
$a = “0”;
$b = “TRUE”;
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);</p>

<?php
$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);

echo "<h2>Valores booleanos de las variables</h2>";
echo "<p>\$a = \"$a\"; // ";
var_dump($a);
echo "<br>\$b = \"$b\"; // ";
var_dump($b);
echo "<br>\$c = FALSE; // ";
var_dump($c);
echo "<br>\$d = (\$a OR \$b); // ";
var_dump($d);
echo "<br>\$e = (\$a AND \$c); // ";
var_dump($e);
echo "<br>\$f = (\$a XOR \$b); // ";
var_dump($f);
echo "</p>";
?>

<p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
usando la función var_dump(<datos>).</p>

<?php
$c_str = var_export($c, true);
$e_str = var_export($e, true);

echo "<p>\$c = FALSE; // ";
echo $c_str;
echo "<br>\$e = (\$a AND \$c); // ";
echo $e_str;
echo "</p>";
?>

<h2>Ejercicio 7</h2>
<p>Usando la variable predefinida $_SERVER, determina lo siguiente:
a. La versión de Apache y PHP,
b. El nombre del sistema operativo (servidor),
c. El idioma del navegador (cliente).</p>

<?php
// a. La versión de Apache y PHP
$apacheVersion = $_SERVER['SERVER_SOFTWARE'];
$phpVersion = phpversion();

echo "a. Versión de Apache: $apacheVersion<br>";
echo "   Versión de PHP: $phpVersion<br>";

// b. El nombre del sistema operativo (servidor)
$serverOS = php_uname('s');

echo "b. Sistema Operativo del Servidor: $serverOS<br>";

// c. El idioma del navegador (cliente)
$clientLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

echo "c. Idioma del Navegador del Cliente: $clientLanguage<br>";
?>

</body>
</html>