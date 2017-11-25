<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 25/11/17
 * Time: 11:36
 */

namespace Code\Controller;

abstract class BaseController
{
    protected function getConfig ($configName)
    {
        if (!file_exists($config = CONFIG_PATH . $configName . '.php'))
        {
            throw new \Exception("Config not found");
        }

        return require $config;
    }
}