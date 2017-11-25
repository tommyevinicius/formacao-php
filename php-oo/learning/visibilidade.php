<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 09:39
 */

class Printer
{
    private $model;

    public function  getModel()
    {
        return 'Model is ' . $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
}

$printer = new Printer();
print $printer->getModel();
print $printer->setModel('HP');
echo '<br/>';
print $printer->getModel();