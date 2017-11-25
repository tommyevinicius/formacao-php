<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 11:14
 */

class People
{
    private $data = array();

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        print $this->data[$key  ];
    }

    public function getData()
    {
        return var_dump($this->data);
    }
}

$people = new People();
$people->name = 'Nanderson';
$people->age = '30';

print $people->__get(name) . ' - ';
print $people->__get(age);
print $people->getData();