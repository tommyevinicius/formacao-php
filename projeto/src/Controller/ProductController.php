<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 02/12/17
 * Time: 10:53
 */

namespace Code\Controller;

use Code\DB\Connection;
use Code\Entity\Product;
use Code\View;

class ProductController extends BaseController
{
    public function index($slug)
    {
        $product = new Product(Connection::getInstance($this->getConfig('database')));

        $view = new View('single');

        $view->product = $product->where(['slug' => $slug]);

        return $view->render();
    }
}