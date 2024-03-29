<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('views');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/* Nongrata123$
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Pages::views');
$routes->get('home', 'Pages::views');
$routes->get('pages', 'Pages::views/$1');


$routes->add('products-by-sector/(:any)', 'Sectors::productSector/$1');
$routes->add('product-details/(:any)/?(:any)', 'Products::details/$1/?$1');
$routes->add('details-product/(:any)/?(:any)', 'Products::productDetails/$1/?$1');

/** Quotations */
$routes->add('quotation-insurance/(:any)', 'Quotations::quoteInsurance/$1');
$routes->add('load-car/(:any)','Quotations::loadCar/$1');
$routes->add('load-home/(:any)','Quotations::loadHome/$1');
$routes->add('load-request/(:any)','Quotations::loadRequest/$1');
$routes->add('requesting/(:any)','Quotations::requesting/$1');
$routes->add('quote/(:any)','Quotations::quote/$1');

$routes->add('apply-insurance','Quotations::applyInsurance');
$routes->add('apply-home','Quotations::applyHome');
$routes->add('apply','Quotations::apply');

/** Assurance */
$routes->get('assurance-auto','Quotations::auto');
$routes->get('assurance-habitation','Quotations::habitation');
$routes->get('assurance-accident','Quotations::accident');
$routes->get('assurance-vie','Quotations::vie');
$routes->get('assurance-voyage','Quotations::voyage');
$routes->get('assurance-multirisque','Quotations::multirisque');
$routes->get('assurance-chantier','Quotations::chantier');
$routes->get('assurance-responsabilite','Quotations::responsabilite');
$routes->get('assurance-transport','Quotations::transport');

/** Products */
$routes->get('all-products', 'Products::allProducts');

/** Users */
$routes->get('delete-users/(:any)', 'Users::deleteUser/$1');

$myroutes = [];

$myroutes['products'] = 'Products::index';
$myroutes['product'] = 'Products::index';
$myroutes['services'] =  'Pages::services';
$myroutes['dashboard'] =  'Dashboard::index';
$myroutes['organisations'] =  'Organisations::index';
$myroutes['organisation'] =  'Organisations::index';
$myroutes['users'] =  'Users::index';$myroutes['user'] =  'Users::index';
$myroutes['login'] =  'Auth::index';$myroutes['auth'] =  'Auth::index';$myroutes['signin'] =  'Auth::index';
$myroutes['profile'] =  'Auth::profile';$myroutes['logout'] =  'Auth::logout';
$myroutes['reset'] = 'Auth::reset';
$myroutes['change'] = 'Auth::change';
$myroutes['signup'] = 'Auth::signup';
$myroutes['contact'] = 'Auth::contact';

$myroutes['test'] = 'Dashboard::test';
$myroutes['sectors'] = 'Sectors::index';$myroutes['sector'] = 'Sectors::index';

// $routes->set404Override(function(){
//     echo view('errors/404');
// });
$routes->map($myroutes);
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
