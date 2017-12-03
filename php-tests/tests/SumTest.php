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
        $soma = new Sum();

        $result = $soma->sum(3,5);

        $this->assertEquals(8, $result);

        $result = $soma->sum(3.5,5.5);

        $this->assertEquals(9, $result);

        $result = $soma->sum(1,-1);

        $this->assertEquals(0, $result);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Informe dois numeros para somar
     */
    public function testFalhaAoNaoPassarUmValor()
    {
        $soma = new Sum();
        $result = $soma->sum(3);
    }
}