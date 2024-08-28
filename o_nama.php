<?php 
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O nama</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include DOCUMENT_ROOT . "/partial/_header.php" ?>

    <main class="container mt-4">
        <h2>O nama</h2>
        <p>Ovaj završni rad bavi se razvojem i implementacijom web aplikacije s posebnim naglaskom na upravljanje sadržajem i sigurnost web aplikacija. Web aplikacije su postale neizostavan dio moderne informatike i komunikacije. U doba digitalizacije, gdje se sve veći broj korisnika oslanja na Internet za pristup informacijama, uslugama i proizvodima, kvalitetna i sigurna web aplikacija predstavlja ključan dio uspjeha svake organizacije.
U radu fokusirat će se na moderne koncepte web aplikacija, uključujući HTML, CSS, JavaScript, PHP i MySQL. Navedeni alati omogućuju stvaranje interaktivnog korisničkog sučelja te učinkovito upravljanje i pohranu podataka. Kroz praktične primjere i implementaciju stvarne aplikacije, kombinirati će se ove tehnologije za postizanje raznih funkcionalnosti.
</p>
        <h3>Kategorije</h3>
        <ul>
            <li><a href="kategorija.php?kategorija=Putovanja">Putovanja</a></li>
            <li><a href="kategorija.php?kategorija=Ponude">Ponude</a></li>
            <li><a href="kategorija.php?kategorija=Savjeti">Savjeti</a></li>
        </ul>
    </main>

    <?php include DOCUMENT_ROOT . "/partial/_footer.html" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
