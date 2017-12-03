<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 03/12/17
 * Time: 14:38
 */

namespace Code;

class SumService
{
    private $soma;

    public function __construct(Sum $soma)
    {
        $this->soma = $soma;
    }

    public function doSum($num1, $num2)
    {
        return $this->soma->sum($num1, $num2);
    }
}