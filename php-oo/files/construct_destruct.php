<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 11:01
 */

class People
{
    private $name;
    private $age;

    public function __construct()
    {
        print __CLASS__;
    }

    public function __destruct()
    {
        print 'Destructing...';
    }
}

$people = new People();