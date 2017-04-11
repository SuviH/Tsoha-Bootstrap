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

    public static function uusidrinkki() {
        View::make('drinkki/drinkinlisays.html');
    }

    public static function drinkinlisays() {
        // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
        $params = $_POST;
        $maara = $params['maara'];
        $aine = $params['ainesosa'];
        $ainesosat = array();
        for ($i = 0; $i < count($aine); $i++) {

            $ainesosat[] = array(
                'raakaAine' => $aine[$i],
                'maara' => $maara[$i],
            );
        }

        $drinkki = new Drinkki(array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'valmistusohje' => $params['valmistusohje'],
            'ainesosat' => $ainesosat
        ));

        // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
        $drinkki->save();

        // Ohjataan käyttäjä lisäyksen jälkeen drinkin esittelysivulle
        Redirect::to('/drinkki/' . $drinkki->id, array('message' => 'Uusi drinkki lisätty!'));
    }

    public static function muokkaa($id) {
        $drinkki = Drinkki::find($id);
        View::make('drinkki/drinkinmuokkaus.html', array('drinkki' => $drinkki));
    }

    // muokkaaminen (lomakkeen käsittely)
    public static function muokkaaminen($id) {
        $params = $_POST;
        $maara = $params['maara'];
        $aine = $params['ainesosa'];
        $ainesosat = array();
        for ($i = 0; $i < count($aine); $i++) {

            $ainesosat[] = array(
                'raakaAine' => $aine[$i],
                'maara' => $maara[$i],
            );
        }

        $attributes = array(
            'id' => $id,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'tyyppi' => $params['tyyppi'],
            'valmistusohje' => $params['valmistusohje'],
            'ainesosat' => $ainesosat
        );

        $drinkki = new Drinkki($attributes);

        //$errors = $game->errors();
        //if (count($errors) > 0) {
        //    View::make('game/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        //} else {
        // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
        $drinkki->muokkaaminen();

        Redirect::to('/drinkki/' . $drinkki->id, array('message' => 'Drinkkiä muokattu!'));
        //}
    }

    public static function poistadrinkki() {
        $params = $_POST;

        $drinkki = Drinkki::find($params['id']);
        $drinkki->poista();
        Redirect::to('/drinkkilistaus', array('message' => 'Drinkki poistettu!'));
    }

    //put your code here
}
