<?php
namespace App\Services;

class Route{
  private static $routes = [];
  private static $controllerNamespace = 'App\Controllers\\';
  
  public static function add($uri, $controller , $action, $method='GET', 
    
    $middleware=[]){
      
    self::$routes[] = [
      'method'=>$method,
      'uri'=>$uri,
      'controller'=>$controller,
      'action'=>$action,
      'middleware'=>$middleware
      ];
  }
  
	public static function get($uri, $controller,$action,$middleware=[]){
		self::add($uri,$controller,$action,'GET',$middleware);
	}

	public static function post($uri, $controller,$action,$middleware=[]){
		self::add($uri,$controller,$action,'POST',$middleware);
	}
  
public function handle() {
    // Get the current URI and request method
    $requestURI = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    // Get query parameters
    $queryString = parse_url($requestURI, PHP_URL_QUERY); // Extract the query string

    // Initialize draw to 0
    $draw = 0; 
    
    // Check if query string is not null or empty before parsing
    if (!empty($queryString)) {
        parse_str($queryString, $queryParams);
        $draw = isset($queryParams['draw']) ? intval($queryParams['draw']) : 0;
    }

    // Loop through all defined routes to find a match
    foreach (self::$routes as $route) {
        // Split the URI and the route into segments
        $requestSegments = explode('/', trim(parse_url($requestURI, PHP_URL_PATH), '/'));
        $routeSegments = explode('/', trim($route['uri'], '/'));

        // If the number of segments doesn't match, continue to the next route
        if (count($requestSegments) !== count($routeSegments)) {
            continue;
        }

        $params = [];
        $isMatch = true;

        // Compare each segment of the request URI with the route
        foreach ($routeSegments as $index => $segment) {
            if (preg_match('/\{[a-zA-Z]+\}/', $segment)) {
                // If the segment is a parameter (e.g., {id}), extract the value
                $paramName = trim($segment, '{}');
                $params[$paramName] = $requestSegments[$index];
            } elseif ($segment !== $requestSegments[$index]) {
                // If the segment doesn't match and isn't a parameter, it's not a match
                $isMatch = false;
                break;
            }
        }

        if ($isMatch && $route['method'] === $requestMethod) {
            // Run middleware (if any)
            foreach ($route['middleware'] as $middleware) {
                $middlewareClass = new $middleware;
                $middlewareClass->handle();
            }

            // Instantiate the controller and call the action method with parameters
            $controllerClass = self::$controllerNamespace . $route['controller'];
            $controller = new $controllerClass();
            
            // Pass parameters to the action method including 'draw'
            $params['draw'] = $draw; // Add the draw parameter to the params
            $controller->{$route['action']}(...array_values($params)); // Pass parameters to the action method

            return; // Stop further processing after a match is found
        }
    }

    // If no route matched, show a "route not found" message
     $controllerClass = self::$controllerNamespace . "BaseController";
            $controller = new $controllerClass();
    
    $action = ['pageNotFound'] ;
    
  $method = $action[0];
           $controller->$method();
          
}

}


?>