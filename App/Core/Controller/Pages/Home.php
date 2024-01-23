<?php

namespace App\Core\Controller\Pages;

use App\Core\Controller\Components\BaseStructure;
use App\Core\Controller\Components\Navbar;
use App\Utils\View;

class Home {

    public static function render($params = []) {

        $viewPath = "pages/home";
        $vars = [
            "navbar" => Navbar::render([
                "siteName" =>  SITE_NAME,
            ]),
            "title" => SITE_NAME,
            "description" => SITE_DESCRIPTION,
        ];

        echo BaseStructure::render(View::render("pages/home", $vars), [
            "links" => [
                ["rel" => "stylesheet", "href" => URL_BASE."/assets/css/home.css"]
            ],
            "scripts" => [
                ["type" => "module", "async" => true, "src" => URL_BASE."/assets/js/home.js"]
            ]
        ]);

    }

}