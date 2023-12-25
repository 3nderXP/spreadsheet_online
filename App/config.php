<?php

session_start();

// Configurações da URL

define("SITE_PROTOCOL", isset($_SERVER["HTTPS"]) ? "https://" : "http://");
define("SITE_DOMAIN", $_SERVER["SERVER_NAME"]);
define("SITE_ROOT", "/worksheet_online");
define("URL_BASE", SITE_PROTOCOL.SITE_DOMAIN.SITE_ROOT);

// Configurações gerais do site

define("SITE_NAME", "Worksheet Online");
define("SITE_DESCRIPTION", "Crie, personalize e gerencie suas planilhas de forma intuitiva e eficaz em um único lugar! Simplifique sua vida de planilhas com praticidade e inteligência.");
define("SITE_THEME", "#6203fc");
define("SITE_LANG", "pt-BR");
define("SITE_CHARSET", "UTF-8");