<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 07/10/17
 * Time: 11:16
 */

$array1 = [10, true, "Name"];
$array2 = array(10, true, "Name");

$matriz = [
    "products" => [
        ["name" => "Produto1", "price" => 19.9],
        ["name" => "Produto2", "price" => 9.99]
    ],
    "people" => [
        ["name" => "Nanderson", "lastname" => "Teacher"],
        ["name" => "Atmos", "lastname" => "Folgado"]
    ]
];

var_dump($matriz);