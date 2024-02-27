<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Home::login'); 
$routes->post('/authenticate', 'Home::authenticate');  
$routes->post('vlogin', 'Home::authenticate');
$routes->get('maMethode', 'Home::maMethode');

$routes->get('deconnexion', 'Home::deconnexion');
$routes->get('/conference', 'Home::Conference'); 
$routes->get('conferences', 'ConferenceController::getlesConference');
$routes->post('home/submitReservation', 'Home::submitReservation');
$routes->post('home/submitReservation', 'Home::submitReservation');


$routes->get('/', 'Home::index2');


$routes->get('home/index2/(:num)', 'Home::index2/$1');
$routes->get('reservation', 'Home::index3');


// Dans votre fichier de routes (routes.php dans CodeIgniter)
$routes->get('Reservation/getPresentations', 'Home::getPresentations');

// app\Config\Routes.php

$routes->get('/', 'Home::index'); // Route pour la méthode index

$routes->group('home', function ($routes) {
    $routes->post('authenticate', 'Home::authenticate'); // Route pour la méthode authenticate
});
$routes->get('/HomePage', 'Home::HomePage');
$routes->get('/info', 'Home::info');

$routes->get('/popup', 'Home::popup');
$routes->get('/erro', 'Home::erro');
$routes->get('/vue', 'Home::vue');
$routes->get('/pdf', 'Home::pdf');
$routes->get('/header', 'Home::header');
$routes->get('/Reservation', 'Home::Reservation');
$routes->get('/Presentation', 'Home::Presentation');

// app/Config/Routes.php

$routes->get('prestation', 'Modele ::getlesPresentation');


$routes->get('/conference/(:num)', 'Home::showPresentations/$1');

// Route pour afficher le formulaire de réservation
$routes->get('/Presentation', 'Home::showReservationForm');

// Route pour soumettre le formulaire de réservation
$routes->post('/Presentation', 'Home ::submitReservation');

// Route pour afficher la page de confirmation de réservation
$routes->get('/Presentation', 'ReservationController::showConfirmationPage');

$routes->get('generate-pdf', 'Home::generatePdf');
