<?php
include 'connect.php';
$id = $_GET['id'];
$query = "SELECT * FROM vijesti WHERE id=$id";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['naslov']); ?></title>
    <link rel="stylesheet" href="styles/style_clanak.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_header.php" ?>

    <main class="container mt-4">
        <article class="article">
            <p class="category"><?php echo htmlspecialchars($row['kategorija']); ?></p>
            <h1 class="title"><?php echo htmlspecialchars($row['naslov']); ?></h1>
            <p class="author">AUTOR: <?php echo htmlspecialchars($row['autor']); ?></p>
            <p class="published">OBJAVLJENO: <?php echo date('d.m.Y.', strtotime($row['datum'])); ?></p>
            <img src="<?php echo htmlspecialchars(UPLPATH . $row['slika']); ?>" alt="<?php echo htmlspecialchars($row['naslov']); ?>" class="img-fluid">
            <p class="content"><?php echo nl2br(htmlspecialchars($row['tekst'])); ?></p>
        </article>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_footer.html" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
