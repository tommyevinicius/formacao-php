<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 10:47
 */

abstract class Connection
{
    public function doConnection()
    {
        return 'Do connection...';
    }

    abstract public function setConnection();
}

class Entity extends Connection
{
    public function doClose()
    {
        return 'Do closing...';
    }

    public function setConnection()
    {
        return '';
    }
}

$entity = new Entity();

print $entity->doConnection();