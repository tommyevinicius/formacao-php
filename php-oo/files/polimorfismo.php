<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 10:01
 */

class Printer
{
    protected $printer = '';
    public function toPrint()
    {
        return $this->printer . ' is printing...';
    }
}

class HP extends Printer
{
    protected $printer = 'HP';

    public function toPrint()
    {
        return $this->printer . ' is printing...';
    }
}

class Epson extends Printer
{
    protected $printer = 'Epson';

    public function toPrint()
    {
        return $this->printer . ' is printing...';
    }
}

$printer = new Epson();
print $printer->toPrint();