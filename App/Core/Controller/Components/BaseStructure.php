<?php

namespace App\Core\Controller\Components;

use App\Utils\View;
use App\Core\Controller\Components\Links;
use App\Core\Controller\Components\Scripts;

class BaseStructure {

    public static function render(string $content, array $params = []) {

        $viewPath = "Components/BaseStructure";
        $vars = [
            "lang" => SITE_LANG,
            "title" => SITE_NAME,
            "content" => $content,
            "links" => self::getLinks(isset($params["links"]) ? $params["links"] : []),
            "scripts" => self::getScripts(isset($params["scripts"]) ? $params["scripts"] : []),
            "urlBase" => URL_BASE
        ];

        return View::render($viewPath, $vars);
        
    }

    private static function getLinks(array $links = []) {

        $defaultLinks = [
            ["rel" => "stylesheet", "href" => URL_BASE."/assets/css/global.css"],
        ];

        return Links::render(array_merge($defaultLinks, $links));

    }

    private static function getScripts(array $scripts = []) {

        $defaultScripts = [
            // ["src" => "LINK_HERE"],
        ];

        return Scripts::render(array_merge($defaultScripts, $scripts));

    }


}