<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 09:58
 */

function sum ($a, $b) {
    return $a + $b;
}

/**
 * @param array ...$a
 * @see Função que aceita vários parâmetros numéricos.
 */
function sum_array (...$a) {
    $total = 0;
    foreach ($a as $item) {
        $total += $item;
    }

    return $total;
}

function divide($num1, $num2) {
    if ($num2 <= 0) {
        return "Não pode ser dividido por um número menor ou igual a 0";
    }
    else {
        return $num1 / $num2;
    }
}

$a = 10;
$b = 10;

print sum($a, $b) . '<hr>';
print sum_array($a, $b, $a, $b) . '<hr>';
print divide($a, 0) . '<hr>';