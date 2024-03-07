<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/','Projekt::zkouska');
//$routes->get('zkouseni','Projekt::zkouseni');

//veřejnost
$routes->get('pojmy', 'Pojmy::get');
$routes->get('kategorie', 'Kategorie::get');


//pro učitele
$routes->get('uzivatel/pojmy','Pojmy::getUziv');
$routes->get('uzivatel/pojmy/pridat','Pojmy::pridatPojem');
$routes->post('uzivatel/pojmy/novy','Pojmy::pridat');

$routes->get('uzivatel/kategorie', 'Kategorie::getUziv');
$routes->get('uzivatel/kategorie/pridat', 'Kategorie::pridatKat');
$routes->post('uzivatel/kategorie/novy', 'Kategorie::pridat');
$routes->get('uzivatel/kategorie/(:num)', 'Kategorie::kategorie/$1');

$routes->get('uzivatel/podminky/vytvorit', 'Podminky::vlozit');
//$routes->get('uzivatel/podminky/pridat', 'Podminky::pridatPod');
//$routes->post('uzivatel/podminky/novy', 'Podminky::pridat');

$routes->get('skupiny/vlozeni', 'PodminkyVlozeni::index');
$routes->post('skupiny/vlozeni/ulozit', 'PodminkyVlozeni::ulozit');




//admin!




//losování pojmů
$routes->get('zkouseni', 'Zkouska::losuj');
$routes->post('zkouseni', 'Zkouska::losuj/$1');

//kategorie

//přihlašování
//$routes->get('login', 'Dashboard::log'); //přejmenovat!!!



//jen pro admina!
$routes->group('admin', ['namespace' => 'App\Controllers'], function($routes)
{
    $routes->get('pojmy', 'Admin::pojmy');
    $routes->post('schvalitSmazat', 'Admin::schvalitSmazat');

    $routes->get('kategorie', 'Admin::kategorie');
    $routes->post('schvalitVymazat2', 'Admin::schvalitVymazat2');

    $routes->get('pojmy/upravit', 'Admin::upravit');
    $routes->get('pojmy/upravit/(:num)', 'Admin::upravitPojem/$1');
    $routes->put('pojmy/konecUprav', 'Admin::upravKonec');
    $routes->get('pojmy/smazat/(:num)', 'Admin::deletePoj/$1');

    $routes->get('kategorie/upravit', 'Admin::upravitKat');
    $routes->get('kategorie/upravit/(:num)', 'Admin::upravitKategorii/$1');
    $routes->put('kategorie/konecUprav', 'Admin::upravKonecKat');
    $routes->get('kategorie/smazat/(:num)', 'Admin::deleteKat/$1');
});

$routes->get('admin/pojmy', 'Admin::pojmy');




//IonAuth --------------------------------------------------------------------------

$routes->group('auth', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->add('forgot_password', 'Auth::forgot_password');
    // $routes->get('/', 'Auth::index');
    // $routes->add('create_user', 'Auth::create_user');
    // $routes->add('edit_user/(:num)', 'Auth::edit_user/$1');
    // $routes->add('create_group', 'Auth::create_group');
    // $routes->get('activate/(:num)', 'Auth::activate/$1');
    // $routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2');
    // $routes->add('deactivate/(:num)', 'Auth::deactivate/$1');
    // $routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
    // $routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
    // ...
});


