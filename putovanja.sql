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

INSERT INTO vijesti (datum, naslov, autor, sazetak, tekst, slika, kategorija, arhiva)
VALUES
('2024-07-20', 'Prekrasni krajolici Hrvatske', 'Ana Horvat', 'Kratki vodič kroz najljepše krajolike Hrvatske.', 'Hrvatska je zemlja s mnogo prekrasnih krajolika. U ovom članku ćemo vam predstaviti neka od najljepših mjesta koja morate posjetiti. Uživajte u prekrasnim plažama, nacionalnim parkovima i slikovitim selima.', 'krajolici.jpg', 'Putovanja', 0);

INSERT INTO vijesti (datum, naslov, autor, sazetak, tekst, slika, kategorija, arhiva)
VALUES
('2024-07-18', 'Top ponude za ljetovanje', 'Marko Perić', 'Najbolje ponude za ljetovanje u 2024. godini.', 'Ako planirate ljetovanje, ovo je pravo vrijeme da iskoristite naše top ponude. Nudimo popuste na smještaj, avionske karte i paket aranžmane za najljepše destinacije.', 'ljetovanje.jpg', 'Ponude', 0);

INSERT INTO vijesti (datum, naslov, autor, sazetak, tekst, slika, kategorija, arhiva)
VALUES
('2024-07-15', 'Savjeti za sigurnija putovanja', 'Ivana Kovač', 'Kako se pripremiti za sigurno putovanje.', 'Sigurnost na putovanju je izuzetno važna. U ovom članku donosimo vam nekoliko savjeta kako se pripremiti za sigurno putovanje. Od odabira prave destinacije, osiguranja, do sigurnosnih mjera koje možete poduzeti tijekom putovanja.', 'savjeti.jpg', 'Savjeti', 0);


CREATE TABLE korisnik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(50) NOT NULL,
    korisnicko_ime VARCHAR(50) NOT NULL UNIQUE,
    lozinka VARCHAR(255) NOT NULL,
    razina INT NOT NULL
);
