<?php
$router = new Router();
$router->auth_redirect_to = '/login';
$router->guest_redirect_to = '/';
$router->notfound_controller = 'controllers/notfound.controller.php';
$router->get('', 'controllers/index.controller.php');
$router->get('about', 'controllers/about.controller.php', 'auth');
$router->get('contact', 'controllers/contact.controller.php');
$router->get('login', 'controllers/login.controller.php', 'guest');
$router->get('logout', 'controllers/logout.controller.php', 'auth');
$router->get('demo-login', 'controllers/demo-login.controller.php');


