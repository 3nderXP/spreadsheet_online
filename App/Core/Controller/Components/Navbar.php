<?php

namespace App\Core\Controller\Components;

use App\Utils\View;

class Navbar {

    public static function render(array $params = []) {

        return View::render("Components/Navbar", $params);

    }

}