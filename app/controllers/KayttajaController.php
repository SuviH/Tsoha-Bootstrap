<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author suvi
 */
class KayttajaController extends BaseController {

    public static function login() {
        View::make('user/kirjautuminen.html');
    }
    public static function logout(){
        session_destroy();
        Redirect::to('/etusivu');
    }
    public static function handle_login() {
        $params = $_POST;
        
        $kayttaja = Kayttaja::authenticate($params['nimi'], $params['salasana']);
        if (!$kayttaja) {
            View::make('user/kirjautuminen.html', array('message' => 'Väärä käyttäjätunnus tai salasana!', 'nimi' => $params['nimi']));
        } else {
            $_SESSION['kayttaja'] = $kayttaja->id;

            Redirect::to('/drinkkilistaus', array('message' => 'Tervetuloa drinkkiarkistoon ' . $kayttaja->nimi . '!'));
        }
    }

}
