<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//CRUD GET
$routes->get('profiles-list', 'Profile::index' );
$routes->get('profile-form', 'Profile::create' );
//CRUD POST
$routes->post('submit-form', 'Profile::store' );
$routes->get('edit-view/(:num)', 'Profile::singleProfile/$1' );
$routes->post('update', 'Profile::update' );
$routes->get('delete/(:num)', 'Profile::delete/$1' );
//CRUD ROLE GET
$routes->get('roles-list', 'Role::index' );
//$routes->get('profile-form', 'Profile::create' );
$routes->get('delete-role/(:num)', 'Role::delete/$1' );
