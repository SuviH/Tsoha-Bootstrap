<?php

class BaseController {

    public static function get_user_logged_in() {

        if (isset($_SESSION['kayttaja'])) {
            $user_id = $_SESSION['kayttaja'];
            // Pyydetään User-mallilta käyttäjä session mukaisella id:llä
            $user = Kayttaja::find($user_id);

            return $user;
        }

        // Käyttäjä ei ole kirjautunut sisään
        return null;
    }

    public static function check_logged_in() {
        if (!isset($_SESSION['kayttaja'])) {
            Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
        }
    }

}
