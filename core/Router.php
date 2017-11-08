<?php
class Router {
  public $getRoutes = [];
  public $postRoutes = [];
  public $notfound_controller = 'controllers/notfound.controller.php';
  public $login_redirect_to = '/login';
  /**
   * for adding get routes to the page
   * @param  [type]  $uri        [that will be main uri of the router]
   * @param  [type]  $controller [this controller will be return when user try to access above uri]
   * @param  boolean $auth       [whether auth check true or false]
   * @return void
   */
  public function get($uri, $controller, $auth = false)
  {
    $this->getRoutes[$uri] = [$controller, $auth];
  }
  /**
   * for adding post routes to the page
   * @param  [type]  $uri        [that will be main uri of the router]
   * @param  [type]  $controller [this controller will be return when user try to access above uri]
   * @param  boolean $auth       [whether auth check true or false]
   * @return void
   */
  public function post($uri, $controller, $auth = false)
  {
    $this->postRoutes[$uri] = [$controller, $auth];
  }
  private function checking_auth($controller, $auth)
  {
    if ($auth && isset($_SESSION['user_id'])) {
      return $controller;
    } 
    if ($auth && ! isset($_SESSION['user_id'])) {
      header('Location: ' . $this->login_redirect_to);
    }
    return $controller;
  }
  private function direct_to_post_route($uri)
  {
    if (array_key_exists($uri, $this->postRoutes)) {
      return $this->checking_auth(...$this->postRoutes[$uri]);
    } else {
      return $this->notfound_controller;
    }
  }
  private function direact_to_get_route($uri)
  {
    if (array_key_exists($uri, $this->getRoutes)) {
      return $this->checking_auth(...$this->getRoutes[$uri]);
    } else {
      return  $this->notfound_controller;
    }
  }
  public function direct ($uri, $method) {
    return $method === 'POST' ? $this->direct_to_post_route($uri) : $this->direact_to_get_route($uri);
  }

}