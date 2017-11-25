<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 11:09
 */

class People
{
    private $name;
    private $age;

    public function __toString()
    {
        return "Object printed";
    }
}

$people = new People();

print $people;