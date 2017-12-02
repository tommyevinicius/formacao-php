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
use Code\View;
use Code\Entity\Product;

class HomeController extends BaseController
{
    public function index()
    {
        $users = new User(Connection::getInstance($this->getConfig('database')));
        $products = new Product(Connection::getInstance($this->getConfig('database')));

        $view = new View('home');

        $view->users = $users->findAll();

        $view->products = $products->findAll();

        return $view->render();

    }
}