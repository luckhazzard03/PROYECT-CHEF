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

//GROUP ROUTES
$routes->group("roles", function ($routes) {
	$routes->get("show", "Role::index");
	$routes->post("create", "Role::insert");
	$routes->get("edit/(:num)", "Role::singleRole/$1");
	$routes->post("update", "Role::update");
	$routes->get("delete/(:num)", "Role::delete/$1");
});

//GROUP ROUTES
$routes->group("userStatus", function ($routes) {
	$routes->get("show", "UserStatus::index");
	//$routes->post("create", "Role::insert");
	//$routes->get("edit/(:num)", "Role::singleRole/$1");
	//$routes->post("update", "Role::update");
	//$routes->get("delete/(:num)", "Role::delete/$1");
});

//$routes->get('roles-list', 'Role::index' );
//$routes->get('profile-form', 'Profile::create' );
//$routes->get('edit-role/(:num)', 'role::singleRole/$1' );
//$routes->get('delete-role/(:num)', 'Role::delete/$1' );