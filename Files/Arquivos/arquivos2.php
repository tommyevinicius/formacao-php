<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 28/10/17
 * Time: 10:13
 */

$fileread = __DIR__ . "/exemplo.txt";

$file = file_get_contents($fileread);

file_put_contents(__DIR__ . "/fileP.txt", "Escrito com file put_content", FILE_APPEND);

print $file;