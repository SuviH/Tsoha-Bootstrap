<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/etusivu', function() {
    HelloWorldController::etusivu();
});

$routes->get('/listaus', function() {
    HelloWorldController::listaus();
});

$routes->get('/drinkki', function() {
    HelloWorldController::drinkinEsittely();
});

$routes->get('/drinkinmuokkaus', function() {
    HelloWorldController::drinkinMuokkaus();
});
$routes->get('/drinkkilistaus', function() {
    DrinkkiController::drinkkilistaus();
});

$routes->post('/drinkki', function() {
    DrinkkiController::drinkinlisays();
});
// Pelin lisäyslomakkeen näyttäminen
$routes->get('/drinkki/lisaa', function() {
    DrinkkiController::uusidrinkki();
});
$routes->get('/drinkki/:id', function($id) {
    DrinkkiController::drinkinesittely($id);
});
$routes->post('/drinkki/poista', function() {
    DrinkkiController::poistadrinkki();
});