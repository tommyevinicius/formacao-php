<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 28/10/17
 * Time: 09:22
 */

$file = fopen(__DIR__ . "/exemplo.txt", "a+");

fwrite($file, "Texto exemplo no arquivo" . PHP_EOL);
fclose($file);

// Irá deletar o arquivo.
// file_exists(__DIR__ . "/exemplo.txt") ? unlink(__DIR__ . "/exemplo.txt") : "";