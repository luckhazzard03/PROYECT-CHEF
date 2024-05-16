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

//GROUP ROUTES roles
$routes->group("roles", function ($routes) {
	$routes->get("show", "Role::index");
	$routes->post("create", "Role::insert");
	$routes->get("edit/(:num)", "Role::singleRole/$1");
	$routes->post("update", "Role::update");
	$routes->get("delete/(:num)", "Role::delete/$1");
});

//GROUP ROUTES userStatus
$routes->group("userStatus", function ($routes) {
	$routes->get("/", "UserStatus::index");
	$routes->get("show", "UserStatus::index");
	$routes->get("edit/(:num)", "UserStatus::singleUserStatus/$1");	
	$routes->get("delete/(:num)", "UserStatus::delete/$1");
	$routes->post("add", "UserStatus::create");
	$routes->post("update", "UserStatus::update");
});

//GROUP ROUTES MODULES
$routes->group("module", function ($routes) {
	$routes->get("/", "Module::index");
	$routes->get("show", "Module::index");
	$routes->get("edit/(:num)", "Module::singleModule/$1");	
	$routes->get("delete/(:num)", "Module::delete/$1");
	$routes->post("add", "Module::create");
	$routes->post("update", "Module::update");
});

//GROUP ROUTES PERMISSION
$routes->group("permission", function ($routes) {
	$routes->get("/", "Permission::index");
	$routes->get("show", "Permission::index");
	$routes->get("edit/(:num)", "Permission::singlePermission/$1");	
	$routes->get("delete/(:num)", "Permission::delete/$1");
	$routes->post("add", "Permission::create");
	$routes->post("update", "Permission::update");
});

//$routes->get('roles-list', 'Role::index' );
//$routes->get('profile-form', 'Profile::create' );
//$routes->get('edit-role/(:num)', 'role::singleRole/$1' );
//$routes->get('delete-role/(:num)', 'Role::delete/$1' );