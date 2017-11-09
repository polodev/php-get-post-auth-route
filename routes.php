<?php
$router = new Router();
$router->notfound_controller = 'controllers/notfound.controller.php';
$router->login_redirect_to = '/login';
$router->get('', 'controllers/index.controller.php');
$router->get('about', 'controllers/about.controller.php', true);
$router->get('contact', 'controllers/contact.controller.php');
$router->get('login', 'controllers/login.controller.php');
$router->get('logout', 'controllers/logout.controller.php');
$router->get('demo-login', 'controllers/demo-login.controller.php');


