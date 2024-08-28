<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naslov = $_POST['naslov'];
    $autor = $_POST['autor'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    $arhiva = isset($_POST['prikazi']) ? 0 : 1;
    $datum = date('Y-m-d');

    $target_dir = "slike/";
    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);
    $slika = basename($_FILES["slika"]["name"]);

    $query = "INSERT INTO vijesti (datum, naslov, autor, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum', '$naslov', '$autor', '$sazetak', '$tekst', '$slika', '$kategorija', '$arhiva')";
    
    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    mysqli_close($dbc);

    header("Location: index.php");
    exit();
}
?>
