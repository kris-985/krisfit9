<?php

class Router
{
  private $routes = array();
  private $notFoundHandler;

  public function addRoute($route, $handler)
  {
    $this->routes[$route] = $handler;
  }

  public function setNotFoundHandler($handler)
  {
    $this->notFoundHandler = $handler;
  }

  public function handleRequest($request)
  {
    // Check if the requested route matches any of the defined routes
    $matchedRoute = $this->matchRoute($request);

    if ($matchedRoute) {
      $handler = $matchedRoute['handler'];

      // If the route has parameters, extract them from the URL
      if (!empty($matchedRoute['params'])) {
        $params = $this->extractParams($matchedRoute['route'], $request);
        $handler($params);
      } else {
        $handler();
      }
    } else {
      $this->handleNotFound();
    }
  }

  private function matchRoute($requestedRoute)
  {
    foreach ($this->routes as $route => $handler) {
      // Convert route to a regular expression to support placeholders
      $pattern = preg_replace('/:[^\/]+/', '([^/]+)', $route);
      $pattern = '@^' . $pattern . '$@';

      // Check if the requested route matches the defined route pattern
      if (preg_match($pattern, $requestedRoute, $matches)) {
        // If the route has parameters, store them
        if (strpos($route, ':') !== false) {
          $params = array_slice($matches, 1);
          return array('route' => $route, 'handler' => $handler, 'params' => $params);
        }

        return array('route' => $route, 'handler' => $handler);
      }
    }

    return false;
  }

  private function extractParams($route, $requestedRoute)
  {
    // Extract parameters from the requested route based on the route pattern
    $routeParts = explode('/', trim($route, '/'));
    $requestedParts = explode('/', trim($requestedRoute, '/'));
    $params = array();

    foreach ($routeParts as $index => $part) {
      if (strpos($part, ':') === 0) {
        $paramName = ltrim($part, ':');
        $paramValue = $requestedParts[$index];
        $params[$paramName] = $paramValue;
      }
    }

    return $params;
  }

  private function handleNotFound()
  {
    if ($this->notFoundHandler) {
      $handler = $this->notFoundHandler;
      $handler();
    } else {
      $response = new Response();
      $response->setStatusCode(Response::HTTP_NOT_FOUND);
      $response->sendError("page_not_found");
    }
  }
}