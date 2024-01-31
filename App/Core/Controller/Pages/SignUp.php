<?php

namespace App\Core\Controller\Pages;

use App\Core\Controller\Components\BaseStructure;
use App\Core\Controller\Components\PreviousButton;
use App\Core\Model\Crud\Users;
use App\Core\Model\Entities\User;
use App\Utils\View;
use CoffeeCode\Router\Router;
use Exception;

class SignUp {

    private Router $router;

    public function __construct(Router $router) {

        $this->router = $router;
        
    }

    public static function render(array $params = []) {
       
        $viewPath = "Pages/SignUp";
        $vars = [
            "previousButton" => PreviousButton::render(URL_BASE),
        ];

        $user = new User;
        $users = new Users;

        if(isset($params["submit"])){

            $user->setName($params["name"]);
            $user->setEmail($params["email"]);
            $user->setPassword($params["password"]);

            if($user->getPassword() !== $params["confirmPassword"]){

                throw new Exception("Senha ta errada meu brother");

            }

            $login = $users->signUp($user);

        }

        echo BaseStructure::render(View::render($viewPath, $vars), [
            "links" => [
                ["rel" => "stylesheet", "href" => URL_BASE."/assets/css/loginSignup.css"]
            ]
        ]);
        
    }

}