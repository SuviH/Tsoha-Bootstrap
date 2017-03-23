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
  
