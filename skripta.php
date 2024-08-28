<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = $_POST['naslov'];
    $autor = $_POST['autor'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    $arhiva = isset($_POST['arhiva']) ? 1 : 0;

    $target_dir = "slike/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
        $slika = htmlspecialchars(basename($_FILES["slika"]["name"]));
    } else {
        $slika = null; 
        echo "Sorry, there was an error uploading your file.";
    }

    $query = "INSERT INTO vijesti (naslov, autor, sazetak, tekst, kategorija, slika, arhiva) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssssssi', $naslov, $autor, $sazetak, $tekst, $kategorija, $slika, $arhiva);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);

    header('Location: index.php');
    exit();
} else {
    echo "Forma nije poslana ispravno.";
}
?>
