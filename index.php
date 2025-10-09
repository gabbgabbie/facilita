<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router("http://localhost/facilita", ":");

$route->namespace("Source\Web");
// Rotas amigáveis da área pública
$route->get("/", "Site:home");
$route->get("/sobre", "Site:about");
$route->get("/contato", "Site:contact");
$route->get("/localizacao", "Site:location");
$route->get("/faqs","Site:faqs");
$route->get("/planos","Site:plans");
$route->get("/login","Site:login");
$route->get("/cadastro","Site:register");
$route->get("/verificação", "Site:passwordCode");
$route->get("/senha/reset", "Site:resetPassword");

// Rotas amigáveis da área restrita
$route->group("/app/dono");

$route->get("/", "Owner:home");
$route->get("/cadastro", "Owner:register");
$route->get("/funcionarios", "Owner:employees");
$route->get("/produtos", "Owner:products");
$route->get("/pedidos", "Owner:orders");
$route->get("/tarefas", "Owner:tasks");
$route->get("/perfil", "Owner:profile");
$route->get("/cafeteria", "Owner:cafeProfile");
$route->get("/mudar-senha", "Owner:password");
$route->group(null);

$route->group("/app/funcionario");

$route->get("/", "Employee:home");
$route->group(null);

$route->group("/admin");
$route->get("/", "Admin:home");
$route->group(null);

$route->get("/ops/{errcode}", "Site:error");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();