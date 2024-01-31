<?php

namespace App\Core\Controller\Components;

use App\Utils\Formatting;
use App\Utils\Url;
use App\Utils\View;

/**
 *
 * Componente para renderizar um botão de retorno à página anterior ou a um URL padrão.
 * 
*/

class PreviousButton {

    /**
     * 
     * Renderiza o botão de retorno à página anterior ou a um URL padrão.
     *
     * @param string $defaultUrl O URL padrão para redirecionamento caso não haja referência HTTP válida.
     * @param array $params Parâmetros adicionais para personalização do botão [opcional].
     *
     * @return string O HTML renderizado do botão.
     * 
    */

    public static function render(string $defaultUrl, array $params = []) {
        
        $viewPath = "Components/PreviousButton";

        $previousUrlIsMyDomain = isset($_SERVER["HTTP_REFERER"]) && Url::isMyDomain($_SERVER["HTTP_REFERER"]);

        $attributes = [
            "href" => $previousUrlIsMyDomain ? $_SERVER["HTTP_REFERER"] : $defaultUrl,
        ];

        if($previousUrlIsMyDomain){

            $attributes["onclick"] = "event.preventDefault() || history.back()";

        }
        
        $vars = [
            "attributes" => Formatting::arrayToAttributes($attributes)
        ];

        return View::render($viewPath, $vars);

    }
}