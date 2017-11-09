<?php
class Router {
  public $getRoutes = [];
  public $postRoutes = [];
  public $notfound_controller = 'controllers/notfound.controller.php';
  public $auth_redirect_to = '/login';
  public $guest_redirect_to = '/';
  /**
   * for adding get routes to the page
   * @param  [type]  $uri        [that will be main uri of the router]
   * @param  [type]  $controller [this controller will be return when user try to access above uri]
   * @param  boolean $middleware       [whether auth check auth or guest or no-auth]
   * @return void
   */
  public function get($uri, $controller, $middleware = 'no-auth')
  {
    $this->getRoutes[$uri] = [$controller, $middleware];
  }
  /**
   * for adding post routes to the page
   * @param  [type]  $uri        [that will be main uri of the router]
   * @param  [type]  $controller [this controller will be return when user try to access above uri]
   * @param  boolean $middleware       [auth check whether auth, guest or no-auth ]
   * @return void
   */
  public function post($uri, $controller, $middleware = 'no-auth')
  {
    $this->postRoutes[$uri] = [$controller, $middleware];
  }
  public function direct_auth($controller) 
  {
    if ( isset($_SESSION['user_id']) ) {
      return $controller;
    }
    header('Location: ' . $this->auth_redirect_to);
  }
  public function direct_guest($controller)
  {
    if ( isset($_SESSION['user_id']) ) {
      header('Location: ' . $this->guest_redirect_to);
    }
    return $controller;
  }
  private function checking_auth($controller, $middleware)
  {
    if ($middleware === 'auth') {
      return $this->direct_auth($controller);
    } else if ($middleware === 'guest') {
      return $this->direct_guest($controller);
    } else {
      return $controller;
    }
  }
  private function direct_to_post_route($uri)
  {
    if (array_key_exists($uri, $this->postRoutes)) {
      return $this->checking_auth(...$this->postRoutes[$uri]);
    } else {
      return $this->notfound_controller;
    }
  }
  private function direct_to_get_route($uri)
  {
    if (array_key_exists($uri, $this->getRoutes)) {
      return $this->checking_auth(...$this->getRoutes[$uri]);
    } else {
      return  $this->notfound_controller;
    }
  }
  public function direct ($uri, $method) {
    return $method === 'POST' ? $this->direct_to_post_route($uri) : $this->direct_to_get_route($uri);
  }

}