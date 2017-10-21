<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 07/10/17
 * Time: 10:23
 */

$var = 'Lorem Ipsum';
$var2 = "Lorem Ipsum";

print '<hr>';
print "String: ". $var . " + " . $var2;
print '<br/>';

var_dump($var);
# Aspas simples, ele não busca a variável.
# Aspas duplas, ele busca a variavéis. Ex: "Teste: $var", imprime Teste: Lorem Ipsum