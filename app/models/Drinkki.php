<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Drinkki
 *
 * @author suvi
 */
class Drinkki extends BaseModel {

    // Attribuutit
    public $id, $kayttaja_id, $nimi, $kuvaus, $lisayspaiva, $tyyppi, $valmistusohje, $ainesosat;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name');
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Drinkki');

        $query->execute();

        $rows = $query->fetchAll();
        $drinkit = array();


        foreach ($rows as $row) {

            $drinkit[] = new Drinkki(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'lisayspaiva' => $row['lisayspaiva'],
                'tyyppi' => $row['tyyppi'],
                'valmistusohje' => $row['valmistusohje'],
            ));
        }

        return $drinkit;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Drinkki WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        $query2 = DB::connection()->prepare('SELECT RaakaAine.nimi, Ainesosa.maara FROM Ainesosa, RaakaAine WHERE Ainesosa.drinkki_id = :id AND Ainesosa.raakaAine_id = RaakaAine.id');
        $query2->execute(array('id' => $id));
        $rows = $query2->fetchAll();
        $ainesosat = array();
        foreach ($rows as $rivi) {

            $ainesosat[] = array(
                'raakaAine' => $rivi['nimi'],
                'maara' => $rivi['maara'],
            );
        }
        if ($row) {
            $drinkki = new Drinkki(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'lisayspaiva' => $row['lisayspaiva'],
                'tyyppi' => $row['tyyppi'],
                'valmistusohje' => $row['valmistusohje']
            ));
            $drinkki->ainesosat = $ainesosat;

            return $drinkki;
        }

        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Drinkki (nimi, kuvaus, valmistusohje) VALUES (:nimi, :kuvaus, :valmistusohje) RETURNING id');

        $query->execute(array('nimi' => $this->nimi, 'kuvaus' => $this->kuvaus, 'valmistusohje' => $this->valmistusohje));

        $row = $query->fetch();
        $this->id = $row['id'];
    }


    // muokkaaminen (lomakkeen käsittely)
    public function muokkaaminen() {
        $query = DB::connection()->prepare('UPDATE Drinkki SET nimi = :nimi, kuvaus = :kuvaus, valmistusohje = :valmistusohje WHERE id = :id');

        $query->execute(array('nimi' => $this->nimi, 'kuvaus' => $this->kuvaus, 'valmistusohje' => $this->valmistusohje, 'id' => $this->id));

        $row = $query->fetch();
        
    }

    public function poista() {
        $query = DB::connection()->prepare('DELETE FROM Drinkki WHERE id = :id');

        $query->execute(array('id' => $this->id));
    }

    public function validate_name() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->nimi) < 2) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }

}
