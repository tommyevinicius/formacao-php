<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 03/12/17
 * Time: 14:18
 */

use PHPUnit\Framework\TestCase;
use Code\Sum;
use Code\SumService;

class SomaServiceTest extends TestCase
{

    /**
     * @see Como se fosse um serviço a ser executado.
     * @example Email-Service
     */
    public function testSomaViaService ()
    {
        $somaService = new SumService($this->getSomaMock());

        $this->assertEquals(5, $somaService->doSum(3, 2));
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     * @see O mesmo que retornar um objeto do banco de dados, sem precisar carregá-lo.
     */
    private function getSomaMock ()
    {
        $mock = $this->getMockBuilder(Sum::class)
                     ->setMethods(['sum'])
                     ->getMock();

        $mock->expects($this->any())
                 ->method('sum')
                 ->will($this->returnValue(5));

        return $mock;
    }
}