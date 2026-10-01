<?php
session_start();
require_once __DIR__ . '/../app/Core/Router.php';
    $router = new Router();

    // pour auth
    $router->chemin('/login', 'AuthController','login');
    //pour societe
    $router->chemin('/', 'SocieteController','index');
    $router->chemin('/societes', 'SocieteController','index');
    $router->chemin('/societes/store', 'SocieteController','store');
    //pour contact
    $router->chemin('/contacts/create', 'ContactController','create');
    //pour interac
    $router->chemin('/interactions/create', 'InteractionController','create');

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if($url === '/auth/login' || $url==='/auth/logout'){
        $router->start();
        
    }
    else{
        ob_start();
        $router->start();
        $contenu = ob_get_clean();
        if(!empty($contenu) || http_response_code() === 400){
            require_once __DIR__ . '/../app/Views/layout.php';
        }
    }
?>