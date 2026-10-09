   <?php

   use CodeIgniter\Router\RouteCollection;

   /** @var RouteCollection $routes */

   // Public pages
   $routes->get('/', 'Pages::index');
   $routes->get('about', 'Pages::about');
   $routes->get('profile', 'Pages::profile');
   $routes->get('tasks', 'Tasks::index');

   // Authentication
   $routes->get('login', 'Auth::login');
   $routes->post('login', 'Auth::attempt');
   $routes->get('logout', 'Auth::logout');

   // Protected pages (login required)
   $routes->group('', ['filter' => 'auth'], static function ($routes) {
       $routes->get('tasks/new', 'Tasks::new');
       $routes->post('tasks/create', 'Tasks::create');
       $routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
       $routes->post('tasks/update/(:num)', 'Tasks::update/$1');
       $routes->post('tasks/archive/(:num)', 'Tasks::archive/$1');

       // Leftover POS pages from TFA4 (remove later if not needed)
       $routes->get('customers', 'Customers::index');
       $routes->get('customers/new', 'Customers::new');
       $routes->post('customers/create', 'Customers::create');
       $routes->get('customers/edit/(:num)', 'Customers::edit/$1');
       $routes->post('customers/update/(:num)', 'Customers::update/$1');

       $routes->get('users', 'Users::index');
       $routes->get('users/new', 'Users::new');
       $routes->post('users/create', 'Users::create');
       $routes->get('users/edit/(:num)', 'Users::edit/$1');
       $routes->post('users/update/(:num)', 'Users::update/$1');
   });