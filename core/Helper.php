<?php
class Helper {
  public static function request_uri()
  {
    return trim (
      parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
      '/'
    );
  }
  public static function request_method()
  {
    $method = $_SERVER['REQUEST_METHOD'];
    return $method;
  }
}
