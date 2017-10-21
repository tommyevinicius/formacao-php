<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 14/10/17
 * Time: 10:00
 */

# Variáveis
$num = 10;
$arr = ['laranja', 'maça', 'banana'];
# /Variáveis

print '<hr>';
print '<h4>IF / ELSE</h4>';
print '<hr>';

if ($num === 10) {
    print 'Passei aqui';
} else {
    print 'Else aqui';
}

print '<hr>';
print '<h4>SWITCH</h4>';
print '<hr>';

switch ($num) {
    case 10: print 'é 10';
        break;

    case 11: print 'é 11';
        break;

    default: print 'é 12';
}

print '<hr>';
print '<h4>WHILE</h4>';
print '<hr>';

$i = 0;
while ($i < count($arr)) {
    print $i . ' => ' . $arr[$i] . "<br />";
    $i++;
}

print '<hr>';
print '<h4>DO WHILE</h4>';
print '<hr>';

$i = 0;
do {
    print $i . ' => ' . $arr[$i] . "<br />";
} while ($i > count($arr));

print '<hr>';
print '<h4>FOR</h4>';
print '<hr>';

for ($i = 0; $i < count($arr); $i++) {
    print $i . ' => ' . $arr[$i] . "<br />";
}

print '<hr>';
print '<h4>FOREACH</h4>';
print '<hr>';

$a = [
    "products" =>
        [
            ["name" => "Produto 1", "price" => 19.9],
            ["name" => "Produto 2", "price" => 9.99]
        ],
    "people" =>
        [
            ["name" => "Nanderson", "lastname" => "Teacher"],
            ["name" => "Tommye", "lastname" => "Toledo"]
        ]
];

foreach ($a["people"] as $k => $b) {
    print $k . ' => ' .$b['name'] . '<br />';
}