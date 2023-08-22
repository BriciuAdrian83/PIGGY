<?php

declare(strict_types=1);

namespace Framework;

class Router {
    private array $routes = [];
  
  public function add(string $method, string $path) {
    $path = $this->normalizePath($path);

    $this->routes[] = [
        'method' => strtoupper($method),
        'path' => $path
    ];
  } 

  private function normalizePath(string $path): string {
    $path = trim($path, '/');

    $path = "/{$path}/";

    $pattern = '#[/]{2,}#';
    $replacingChar = '/';
    $path = preg_replace($pattern, $replacingChar, $path);

    return $path;
  }
}