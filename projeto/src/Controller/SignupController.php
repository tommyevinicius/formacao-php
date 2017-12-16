<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 16/12/17
 * Time: 09:20
 */

namespace Code\Controller;

use Code\Authenticator;
use Code\DB\Connection;
use Code\Entity\User;
use Code\PasswordHash;
use Code\Service\SessionService;
use Code\View;

class SignupController extends BaseController
{
    public function index()
    {
        $view = new View('signup');

        return $view->render();

    }

    public function new()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {
            $data = $_POST;

            $password = new PasswordHash();
            $password = $password->setPassword($data['password'])->generate();

            $user = new User(Connection::getInstance($this->getConfig('database')));
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $password;

            if (!$user = $user->insert()) {
                $this->addFlash('error', 'Erro ao cadastrar usuário!');
                return $this->redirect('signup');
            }

            (new SessionService())->sessionStart();
            $_SESSION['user']['id'] = $user;
            $_SESSION['user']['name'] = $data['name'];

            $this->addFlash('success', 'Escolha Uma Forma de Pagamento!');
            return $this->redirect('checkout');
        }

        return $this->redirect('signup');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            try {
                $user = new User(Connection::getInstance($this->getConfig('database')));

                $authenticator = new Authenticator($data, $user);
                $user = $authenticator->authenticate();

                $authenticator->setUserInSession(new SessionService(), $user);

                return $this->redirect('checkout');
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());
                return $this->redirect('signup');
            }
        }
    }
}