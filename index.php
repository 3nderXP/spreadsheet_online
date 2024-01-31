<?php

use App\Core\Controller\Pages\Error;
use CoffeeCode\Router\Router;

require_once(__DIR__."/vendor/autoload.php");

$router = new Router(URL_BASE);

$router->namespace("App\Core\Controller");

$router->get("/", "Pages\Home:render");

$router->get("/signup", "Pages\SignUp:render");
$router->post("/signup", "Pages\SignUp:render");

$router->get("/login", "Pages\Login:render");
$router->post("/login", "Pages\Login:render");

$router->get("/debug", "Pages\Debug:render");
$router->post("/debug", "Pages\Debug:render");

$router->dispatch();

if($router->error()){

    $httpErrors = [
        400 => "Requisição Inválida",
        401 => "Não Autorizado",
        403 => "Proibido",
        404 => "Não Encontrado",
        405 => "Método Não Permitido",
        406 => "Não Aceitável",
        407 => "Autenticação de Proxy Necessária",
        408 => "Tempo Limite da Requisição",
        409 => "Conflito",
        410 => "Desaparecido",
        411 => "Requisição sem Tamanho Especificado",
        412 => "Pré-condição Falhou",
        413 => "Carga da Requisição Muito Grande",
        414 => "URI Muito Longo",
        415 => "Tipo de Mídia Não Suportado",
        416 => "Faixa Não Satisfatória",
        417 => "Falha na Expectativa",
        418 => "Sou uma Chaleira (I'm a teapot)",
        421 => "Requisição Redirecionada Incorretamente",
        422 => "Entidade Não Processável",
        423 => "Trancado",
        424 => "Dependência Falhada",
        425 => "Tempo Muito Cedo",
        426 => "Atualização Necessária",
        428 => "Pré-condição Necessária",
        429 => "Muitas Requisições",
        431 => "Campos de Cabeçalho da Requisição Muito Grandes",
        451 => "Indisponível por Motivos Legais",
        500 => "Erro Interno do Servidor",
        501 => "Não Implementado",
        502 => "Gateway Ruim",
        503 => "Serviço Indisponível",
        504 => "Tempo Limite do Gateway",
        505 => "Versão do HTTP Não Suportada",
        506 => "Variação Também Negocia",
        507 => "Armazenamento Insuficiente",
        508 => "Detecção de Loop",
        510 => "Não Estendido",
        511 => "Autenticação de Rede Necessária",
    ];

    echo Error::render([
        "code" => $router->error(),
        "message" => $httpErrors[$router->error()],
    ]);

}