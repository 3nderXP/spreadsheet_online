<?php

namespace App\Core\Controller\Pages;

use App\Core\Controller\Components\BaseStructure;
use App\Utils\View;

class Home {

    public static function render() {

        $viewPath = "pages/home";
        $vars = [];

        echo BaseStructure::render(View::render("pages/home", $vars));

    }

}