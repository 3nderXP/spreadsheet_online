<?php

namespace App\Core\Controller\Pages;

use App\Core\Controller\Components\BaseStructure;
use App\Utils\View;

class Login {

    public static function render(array $params = []) {

        $viewPath = "Pages/Login";
        $vars = [];

        echo BaseStructure::render(View::render($viewPath, $vars), [
            "links" => [
                ["rel" => "stylesheet", "href" => URL_BASE."/assets/css/loginSignup.css"]
            ]
        ]);
        
    }

}