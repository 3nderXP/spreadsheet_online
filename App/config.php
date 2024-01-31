<?php

session_start();

// Configurações da URL

define("SITE_PROTOCOL", isset($_SERVER["HTTPS"]) ? "https://" : "http://");
define("SITE_DOMAIN", $_SERVER["SERVER_NAME"]);
define("SITE_ROOT", "/spreadsheet_online");
define("URL_BASE", SITE_PROTOCOL.SITE_DOMAIN.SITE_ROOT);

// Configurações gerais do site

define("SITE_NAME", "Planilha Online");
define("SITE_DESCRIPTION", "Crie, personalize e gerencie suas planilhas de forma intuitiva e eficaz em um único lugar!");
define("SITE_THEME", "#6203fc");
define("SITE_LANG", "pt-BR");
define("SITE_CHARSET", "UTF-8");

// Configurações do sistema

define("LOGS_PATH", __DIR__."/logs");

if(!is_dir(LOGS_PATH)) mkdir(LOGS_PATH, 0700);

error_reporting(E_ALL);

ini_set("display_error", 1);
ini_set("error_log", LOGS_PATH."/backend.log");