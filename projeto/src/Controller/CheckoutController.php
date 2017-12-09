<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 09/12/17
 * Time: 11:52
 */

namespace Code\Controller;

use Code\Service\PagSeguroService;
use Code\Service\SessionService;
use Code\Entity\Product;
use Code\DB\Connection;
use PHPSC\PagSeguro\Items\Item;

class CheckoutController extends BaseController
{
    public function index()
    {
        $checkout = new PagSeguroService();

        SessionService::sessionStart();
        $products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

        foreach($products as $key => $p){
            $product = (new Product(Connection::getInstance($this->getConfig('database'))))
                ->where(['slug' => $p]);
            $checkout->setItem(new Item($product['id'], $product['name'], $product['price']));
        }

        session_destroy();
        header('Location: ' . $checkout->checkout());
    }
}