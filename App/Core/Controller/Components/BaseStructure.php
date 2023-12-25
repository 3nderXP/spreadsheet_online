<?php

namespace App\Core\Controller\Components;

use App\Utils\View;

class BaseStructure {

    public static function render(string $content, array $params = []) {

        $viewPath = "Components/BaseStructure";
        $vars = [
            "lang" => SITE_LANG,
            "title" => SITE_NAME,
            "links" => null,
            "scripts" => null,
            "content" => $content,
            "urlBase" => URL_BASE
        ];

        return View::render($viewPath, $vars);
        
    }

}