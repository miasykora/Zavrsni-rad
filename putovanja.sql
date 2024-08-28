CREATE DATABASE putovanja;

USE putovanja;

CREATE TABLE vijesti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATE,
    naslov VARCHAR(255),
    autor VARCHAR(255),
    sazetak TEXT,
    tekst TEXT,
    slika VARCHAR(255),
    kategorija VARCHAR(50),
    arhiva BOOLEAN
);


CREATE TABLE korisnik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(50) NOT NULL,
    korisnicko_ime VARCHAR(50) NOT NULL UNIQUE,
    lozinka VARCHAR(255) NOT NULL,
    razina INT NOT NULL
);
