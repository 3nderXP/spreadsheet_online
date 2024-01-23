<?php

namespace App\Core\Controller\Components;

use App\Utils\Formatting;
use App\Utils\View;

class Link {

    public static function render(array $attributes) {

        return View::render("Components/link", [
            "attributes" => Formatting::arrayToAttributes($attributes)
        ]);

    }

}