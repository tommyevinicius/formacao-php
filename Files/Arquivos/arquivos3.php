<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 28/10/17
 * Time: 10:35
 */

$file = fopen(__DIR__ . '/exemplo.txt', "r");
$file2 = fopen(__DIR__ . '/fileP.txt', "r");
$content = '';

while (!feof($file)) {
    $content .= fread($file, sizeof($file));
}

while (!feof($file2)) {
    $content .= fread($file2, sizeof($file2));
}

fclose($file);

print $content . PHP_EOL;