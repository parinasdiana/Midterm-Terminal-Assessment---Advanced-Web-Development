<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('api', function($routes) {
    $routes->resource('tasks', ['controller' => 'API\Task']);
});
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::registerView');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');   // Handle logout

// --- Web Interface Routes (Browser) ---
$routes->group('tasks', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'TaskWeb::index');             // View all tasks [cite: 61]
    $routes->post('create', 'TaskWeb::create');      // Add a task [cite: 58]
    $routes->get('toggle/(:num)', 'TaskWeb::toggle/$1'); // Update status [cite: 59]
    $routes->get('delete/(:num)', 'TaskWeb::delete/$1'); // Remove task [cite: 60]
});

// --- API Implementation Routes (Postman) ---
// These follow RESTful conventions [cite: 26]
$routes->group('api', function($routes) {
    $routes->resource('tasks', ['controller' => 'API\Task']);
    /* The resource route above automatically creates:
        GET    /api/tasks          -> index()   [cite: 27]
        POST   /api/tasks          -> create()  [cite: 28]
        PUT    /api/tasks/(:num)   -> update()  [cite: 29]
        DELETE /api/tasks/(:num)   -> delete()  [cite: 30]
    */
});