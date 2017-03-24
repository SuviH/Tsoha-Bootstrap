-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Kayttaja(
  id SERIAL PRIMARY KEY, 
  nimi varchar(50) NOT NULL, 
  salasana varchar(50) NOT NULL
);
CREATE TABLE Tyyppi(
  id SERIAL PRIMARY KEY,
  nimi varchar(50)
);
CREATE TABLE Drinkki(
  id SERIAL PRIMARY KEY,
  kayttaja_id INTEGER REFERENCES Kayttaja(id),
  nimi varchar(50) NOT NULL,
  kuvaus varchar(400),
  lisayspaiva DATE,
  tyyppi INTEGER REFERENCES Tyyppi(id),
  valmistusohje varchar(1000)
);
CREATE TABLE RaakaAine(
  id SERIAL PRIMARY KEY,
  nimi varchar(50) NOT NULL
);
CREATE TABLE Mittayksikko(
  id SERIAL PRIMARY KEY,
  nimi varchar(50) NOT NULL
);
CREATE TABLE Ainesosa(
  id SERIAL PRIMARY KEY,
  drinkki_id INTEGER REFERENCES Drinkki(id),
  raakaAine_id INTEGER REFERENCES RaakaAine(id),
  mitta_id INTEGER REFERENCES Mittayksikko(id),
  maara integer
);
