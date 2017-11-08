<?php
require 'core/boot.php';
require $router->direct(Helper::request_uri(), Helper::request_method()) ;
