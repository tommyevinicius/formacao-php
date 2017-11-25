<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 25/11/17
 * Time: 11:04
 */

namespace Code\Controller;

use Code\DB\Connection;
use Code\Entity\User;

class HomeController extends BaseController
{
    public function index()
    {
        $users = new User(Connection::getInstance($this->getConfig('database')));

        var_dump($users->findAll());
    }
}