<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DrinkkiController
 *
 * @author suvi
 */
class DrinkkiController extends BaseController {

    public static function drinkkilistaus() {

        $drinkit = Drinkki::all();
        View::make('drinkki/drinkkilistaus.html', array('drinkit' => $drinkit));
    }
    public static function drinkinesittely($id) {

        $drinkki = Drinkki::find($id);
        
        View::make('drinkki/drinkinesittely.html', array('drinkki' => $drinkki));
    }
    public static function uusidrinkki(){
        View::make('drinkki/drinkinlisays.html');
    }
    public static function drinkinlisays(){
    // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
    $params = $_POST;
    
    $drinkki = new Drinkki(array(
      'nimi' => $params['nimi'],
      'kuvaus' => $params['kuvaus'],
      'valmistusohje' => $params['valmistusohje']
    ));

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $drinkki->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/drinkki/' . $drinkki->id, array('message' => 'Uusi drinkki lisätty!'));
  }
  public static function poistadrinkki(){
      $params = $_POST;
      
      $drinkki = Drinkki::find($params['id']);
      $drinkki->poista();
      Redirect::to('/drinkkilistaus', array('message' => 'Drinkki poistettu!'));
  }

    //put your code here
}
