<?php

class Router
{
    private array $routes = [];
    private static bool $hasRun = false;

    public function get(string $uri, $action): void
    {
        $this->routes['GET'][$this->normalize($uri)] = $action;
    }

    public function post(string $uri, $action): void
    {
        $this->routes['POST'][$this->normalize($uri)] = $action;
    }

    private function normalize(string $uri): string
    {
        $uri = '/' . trim($uri, '/');
        return $uri === '' ? '/' : $uri;
    }

    public function run(): void
    {
        if (self::$hasRun) {
            return;
        }
        self::$hasRun = true;

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
        $uri    = $this->normalize($uri);

        if ($uri === '/') {
            header('Location: /login');
            exit;
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "<h1>404</h1><p>Route tidak ditemukan: <b>{$uri}</b></p>";
            exit;
        }

        $action = $this->routes[$method][$uri];

        if ($action instanceof Closure) {
            $action();
            exit;
        }

        if (is_string($action)) {
            [$controller, $methodAction] = explode('@', $action);

            $controllerFile = __DIR__ . '/../Controllers/' . $controller . '.php';

            if (!file_exists($controllerFile)) {
                throw new Exception("Controller tidak ditemukan: {$controller}");
            }

            require_once $controllerFile;

            $obj = new $controller();

            if (!method_exists($obj, $methodAction)) {
                throw new Exception("Method {$methodAction} tidak ada di {$controller}");
            }

            $obj->$methodAction();
            exit;
        }

        throw new Exception("Route handler tidak valid");
    }
}