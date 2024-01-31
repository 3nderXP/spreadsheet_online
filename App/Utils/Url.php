<?php

namespace App\Utils;

/**
 * 
 * Classe para manipulação de URLs
 * 
*/

class Url {

    /**
     * Verifica se o URL pertence ao domínio atual
     *
     * @param string $url URL a ser verificada
     * @return bool Retorna `true` se a URL pertence ao domínio atual, caso contrário, `false`.
     * 
    */

    public static function isMyDomain(string $url) {

        $parse = parse_url($url);

        return isset($parse["host"]) && preg_match("/" . SITE_DOMAIN . "/", $parse["host"]);

    }

}