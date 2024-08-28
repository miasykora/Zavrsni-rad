<?php
include 'connect.php';
define('UPLPATH', 'uploads/');

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query);
} elseif (isset($_POST['update'])) {
    $id = $_POST['id'];
    $naslov = $_POST['naslov'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    $arhiva = isset($_POST['archive']) ? 1 : 0;

    $target_file = null;
    if (!empty($_FILES['slika']['name'])) {
        $target_dir = "slike/";
        $target_file = $target_dir . basename($_FILES["slika"]["name"]);
        move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);
        $slika = basename($_FILES["slika"]["name"]);
    }

    if ($target_file) {
        $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id";
    } else {
        $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id";
    }

    $result = mysqli_query($dbc, $query);
}

$query = "SELECT * FROM vijesti";
$result = mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracija vijesti</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Putovanja Online</a>
        <nav class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ponude</a></li>
                <li class="nav-item"><a class="nav-link" href="unos.php">Unos novosti</a></li>
                <li class="nav-item"><a class="nav-link" href="administracija.php">Administracija</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link" href="#">O nama</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mt-4">
        <h2>Administracija vijesti</h2>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo '<form enctype="multipart/form-data" action="administracija.php" method="POST">';
            echo '<div class="form-group">';
            echo '<label for="naslov">Naslov vijesti:</label>';
            echo '<input type="text" class="form-control" id="naslov" name="naslov" value="' . $row['naslov'] . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="sazetak">Kratki sažetak:</label>';
            echo '<textarea class="form-control" id="sazetak" name="sazetak" rows="2">' . $row['sazetak'] . '</textarea>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="tekst">Tekst vijesti:</label>';
            echo '<textarea class="form-control" id="tekst" name="tekst" rows="5">' . $row['tekst'] . '</textarea>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="kategorija">Kategorija:</label>';
            echo '<select class="form-control" id="kategorija" name="kategorija">';
            echo '<option value="Putovanja"' . ($row['kategorija'] == 'Putovanja' ? ' selected' : '') . '>Putovanja</option>';
            echo '<option value="Ponude"' . ($row['kategorija'] == 'Ponude' ? ' selected' : '') . '>Ponude</option>';
            echo '<option value="Savjeti"' . ($row['kategorija'] == 'Savjeti' ? ' selected' : '') . '>Savjeti</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="slika">Slika:</label>';
            echo '<input type="file" class="form-control-file" id="slika" name="slika">';
            if ($row['slika']) {
                echo '<img src="' . UPLPATH . $row['slika'] . '" width="100px">';
            }
            echo '</div>';
            echo '<div class="form-group form-check">';
            echo '<input type="checkbox" class="form-check-input" id="archive" name="archive"' . ($row['arhiva'] == 1 ? ' checked' : '') . '>';
            echo '<label class="form-check-label" for="archive">Arhiviraj?</label>';
            echo '</div>';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<button type="submit" name="update" class="btn btn-primary">Izmijeni</button>';
            echo '<button type="submit" name="delete" class="btn btn-danger">Izbriši</button>';
            echo '</form>';
            echo '<hr>';
        }
        ?>
    </main>

    <footer class="footer mt-4">
        <div class="container">
            <p>&copy; 2024 Putovanja Online | Autor: Mia Ime | Kontakt: mia@example.com</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
