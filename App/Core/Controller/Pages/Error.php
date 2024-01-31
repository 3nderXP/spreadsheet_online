<?php

namespace App\Core\Controller\Pages;

use App\Core\Controller\Components\BaseStructure;
use App\Utils\View;

class Error {

    public static function render(array $params) {

        $viewPath = "Pages/Error";
        $vars = [
            "code" => $params["code"],
            "message" => $params["message"]
        ];

        echo BaseStructure::render(View::render($viewPath, $vars), [
            "links" => [
                ["rel" => "stylesheet", "href" => URL_BASE."/assets/css/error.css"]
            ]
        ]);

    }

}