-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Suvi', 'SuviBest');

INSERT INTO Drinkki (kayttaja_id, nimi, kuvaus, lisayspaiva, valmistusohje) VALUES (1, 'Kossukola', 'Oikea herkkujuoma', '2017-03-22', 'Sekoita ainekset lasissa ja nauti');

INSERT INTO Tyyppi (nimi) VALUES ('cocktail');

INSERT INTO Mittayksikko (nimi) VALUES ('cl');

INSERT INTO RaakaAine (nimi) VALUES ('kola');

INSERT INTO Ainesosa (drinkki_id, raakaAine_id, mitta_id, maara) VALUES (1, 1, 1, 4);

