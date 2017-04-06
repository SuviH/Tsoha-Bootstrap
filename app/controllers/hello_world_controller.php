<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('home.html');
    }

    public static function sandbox(){
      
      $kola = Drinkki::find(1);
      $drinkit = Drinkki::all();
      Kint::dump($drinkit);
      Kint::dump($kola);
      
    }
    public static function etusivu(){
        View::make('suunnitelmat/etusivu.html');
    }
    public static function listaus(){
        View::make('suunnitelmat/listaus.html');
    }
    public static function drinkinEsittely(){
        View::make('suunnitelmat/drinkin_esittely.html');
    }
    public static function drinkinMuokkaus(){
        View::make('suunnitelmat/drinkin_muokkaus.html');
    }
  }
