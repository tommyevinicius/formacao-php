<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 02/12/17
 * Time: 09:26
 */

namespace Code;

class View
{
    private $data;
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function render()
    {
        // Retornar o buffer do browser
        ob_start();

        if (!file_exists($view = VIEWS_PATH . $this->view . '.phtml'))
            die('Fuck you arrombado');

        require $view;

        // Quando limpar, só irá retornar a view
        return ob_get_clean();
    }
}