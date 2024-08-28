<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naslov = $_POST['naslov'];
    $autor = $_POST['autor'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    $slika = $_FILES['slika']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($slika);
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

    echo "<h2>" . htmlspecialchars($naslov) . "</h2>";
    echo "<p><strong>Autor:</strong> " . htmlspecialchars($autor) . "</p>";
    echo "<p><strong>Kratki sažetak:</strong> " . htmlspecialchars($sazetak) . "</p>";
    echo "<p><strong>Tekst vijesti:</strong> " . nl2br(htmlspecialchars($tekst)) . "</p>";
    echo "<p><strong>Kategorija:</strong> " . htmlspecialchars($kategorija) . "</p>";
    echo "<img src='" . htmlspecialchars($target_file) . "' alt='" . htmlspecialchars($naslov) . "'>";
}
?>
