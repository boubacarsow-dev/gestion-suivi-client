<?php
class Router{
    private array $routes = [];
    public function chemin(string $url, string $nomController,string $nomMethode){
        $this->routes[$url] =
        [
            'controller' => $nomController,
            'methode'    => $nomMethode
        ];
    }

    public function start(){
        $url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        if(array_key_exists($url, $this->routes)){
            $nomController = $this->routes[$url]['controller'];
            $nomMethode = $this->routes[$url]['methode'];
            require_once __DIR__ . '/../Controllers/' . $nomController . '.php';
        $controller= new $nomController();
        $controller->$nomMethode();
        }else{
        http_response_code(404);
            echo "<div style='padding:20px;'><h1>Erreur 404 - Page introuvable</h1></div>";
        
        }
    }    
}

?>