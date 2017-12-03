<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 03/12/17
 * Time: 11:11
 */

use PHPUnit\Framework\TestCase;
use Code\Sum;

class SumTest extends TestCase
{
    public function testSumTwoNumbers ()
    {
        $soma = new Sum(3,5);
        $result = $soma->sum();

        $this->assertEquals(8, $result);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Informe dois numeros para somar
     */
    public function testFalhaAoNaoPassarUmValor()
    {
        $soma = new Sum(3);
        $result = $soma->sum();
    }
}