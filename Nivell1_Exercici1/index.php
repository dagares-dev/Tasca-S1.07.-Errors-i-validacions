<?php
declare(strict_types=1);

require_once 'function_divide.php';

$numerator = 13;
$denominator = 0;

echo "<h2>Nivell 1</h2>";
echo "<h3>Exercici 1</h3>";
try {
    $result = divide($numerator, $denominator);
    echo "El resultat és: $result\n";
} catch (DivisionByZeroError $error) {
    echo "Error: no és possible dividir entre zero.\n";
} 