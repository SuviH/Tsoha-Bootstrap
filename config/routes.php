<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/etusivu', function() {
    DrinkkiController::etusivu();
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
$routes->get('/drinkki/:id/muokkaa', function($id){
  // Drinkin muokkauslomakkeen esittäminen
  DrinkkiController::muokkaa($id);
});
$routes->post('/drinkki/:id/muokkaa', function($id){
  
  DrinkkiController::muokkaaminen($id);
});
$routes->get('/login', function(){
  // Kirjautumislomakkeen esittäminen
  KayttajaController::login();
});
$routes->get('/logout', function(){
  // Kirjautumislomakkeen esittäminen
  KayttajaController::logout();
});
$routes->post('/login', function(){
  // Kirjautumisen käsittely
  KayttajaController::handle_login();
});