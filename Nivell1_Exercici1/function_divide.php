<?php
/*
Un cas clàssic de situació que ens pot generar una excepció seria dividir un nombre per 0.
Fes un programa que en el que es pugui produir aquesta situació i gestiona aquest error amb una sentència try-catch.
*/
declare(strict_types=1);

function divide(int $x, int $y): float {
    return $x / $y;
    }
