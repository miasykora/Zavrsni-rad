<?php
session_start();
include 'connect.php';

$kategorija = isset($_GET['kategorija']) ? $_GET['kategorija'] : '';

$query = "SELECT * FROM vijesti WHERE kategorija=? AND arhiva=0 ORDER BY id DESC" ;
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $kategorija);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($kategorija); ?> - Vijesti</title>
    <link rel="stylesheet" href="styles/style_kategorija.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_header.php" ?>

    <main class="container mt-4">
        <h1><?php echo htmlspecialchars($kategorija); ?></h1>
        <hr/>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $naslov = htmlspecialchars($row['naslov']);
                $tekst = htmlspecialchars($row['tekst']);
                $sazetak = htmlspecialchars($row['sazetak']);
                $slika = htmlspecialchars(UPLPATH . $row['slika']);

                echo '<div class="article-card">';
                echo '<img src="' . $slika . '" alt="Slika">';
                echo '<div class="article-content">';
                echo '<h2>' . $naslov . '</h2>';
                echo '<p>' . $sazetak . '</p>';
                echo '<p><a href="clanak.php?id=' . $row['id'] . '">Pročitaj više</a></p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Nema vijesti za prikaz.</p>';
        }
        ?>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_footer.html" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
