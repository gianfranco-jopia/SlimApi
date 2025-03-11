<?php
require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Tuupola\Middleware\CorsMiddleware;

$app = AppFactory::create();

// Middleware CORS
$app->add(new CorsMiddleware([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PUT", "DELETE"],
    "headers.allow" => ["Content-Type", "Authorization"]
]));

// Ruta para obtener usuarios desde la API externa
$app->get('/listarUsuarios', function (Request $request, Response $response, array $args) {
    $apiUrl = "https://reqres.in/api/users/2";
    $data = file_get_contents($apiUrl);
    
    $response->getBody()->write($data);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();