# php get post auth router starter pack
It's a simple php starter pack for clean routing. you can use it for your project. You can start using by php server. `php -S localhost:8000 `
### to setup database
You will find out database setup in  `config.php` file. change appropriate credential to connect with your database.

### Routing
In `routes.php`, you can register a new routes. by following code. `get` or `post` method. Which take minimum 2 arguments. first is uri, 2nd is controller. Third parameter is optional. Which used for auth.
~~~php
//incase of get routes

$router->get('contact', 'controllers/contact.controller.php');
//incase of post routes
$router->post('contact', 'controllers/contact.controller.php');
//if you need auth, keep last parameter as true
$router->get('contact', 'controllers/contact.controller.php', true);
~~~

### adding a new page
* first register a `route` in `routes.php`.
* make controller  inside `controllers` directory which you defined in `routes.php` file
* make a view inside `views` directory which is required by controller.

