<?php
session_start();
include 'connect.php';

$query_putovanja = "SELECT * FROM vijesti WHERE kategorija='Putovanja' AND arhiva=0 order by id desc limit 2";
$query_ponude = "SELECT * FROM vijesti WHERE kategorija='Ponude' AND arhiva=0  order by id desc limit 2";
$query_savjeti = "SELECT * FROM vijesti WHERE kategorija='Savjeti' AND arhiva=0  order by id desc limit 2";

$result_putovanja = mysqli_query($dbc, $query_putovanja);
$result_ponude = mysqli_query($dbc, $query_ponude);
$result_savjeti = mysqli_query($dbc, $query_savjeti);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Putovanja Online</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_header.php" ?>

    <section class="hero-section">
        <div class="container">
            <h1>Putovanja online</h1>
            <p>Sigurna i intuitivna web stranica za putnike koja pruža sve korisne informacije na jednom mjestu.</p>
        </div>
    </section>

    <main class="container container-fluid mt-4">


<div class="row">

<div class="col-12 col-md-6">
    <section id="putovanja" class="category-section">
        <h3><a href="kategorija.php?kategorija=Putovanja">Putovanja</a></h3>
        <div class="article-grid">
            <?php while($row = mysqli_fetch_array($result_putovanja)) { ?>
                <div class="article-card text-center">
                    <img src="<?php echo UPLPATH . htmlspecialchars($row['slika']); ?>" style="width: 100%; max-height: 200px; object-fit: cover;" alt="<?php echo htmlspecialchars($row['naslov']); ?>">
                    <div class="article-content" style="padding: 20px;">
                        <h4 style="font-size: 1.5em; margin-bottom: 15px;"><?php echo htmlspecialchars($row['naslov']); ?></h4>
                        <p style="font-size: 1em; color: #555;"><?php echo htmlspecialchars($row['sazetak']); ?></p>
                        <p><a class="btn btn-light w-75" href="clanak.php?id=<?php echo $row['id']; ?>">Pročitaj više</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<div class="col-12 col-md-6">

    <section id="ponude" class="category-section">
        <h3><a href="kategorija.php?kategorija=Ponude">Ponude</a></h3>
        <div class="article-grid">
            <?php while($row = mysqli_fetch_array($result_ponude)) { ?>
                <div class="article-card text-center">
                    <img src="<?php echo UPLPATH . htmlspecialchars($row['slika']); ?>" style="width: 100%; max-height: 200px; object-fit: cover;" alt="<?php echo htmlspecialchars($row['naslov']); ?>">
                    <div class="article-content" style="padding: 20px;">
                        <h4 style="font-size: 1.5em; margin-bottom: 15px;"><?php echo htmlspecialchars($row['naslov']); ?></h4>
                        <p style="font-size: 1em; color: #555;"><?php echo htmlspecialchars($row['sazetak']); ?></p>
                        <p><a class="btn btn-light w-75" href="clanak.php?id=<?php echo $row['id']; ?>">Pročitaj više</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

</div>

<div class="col-12">
    <section id="savjeti" class="category-section">
        <h3><a href="kategorija.php?kategorija=Savjeti">Savjeti</a></h3>
        <div class="article-grid">
            <?php while($row = mysqli_fetch_array($result_savjeti)) { ?>
                <div class="article-card text-center">
                    <img src="<?php echo UPLPATH . htmlspecialchars($row['slika']); ?>" style="width: 100%; max-height: 200px; object-fit: cover;" alt="<?php echo htmlspecialchars($row['naslov']); ?>">
                    <div class="article-content" style="padding: 20px;">
                        <h4 style="font-size: 1.5em; margin-bottom: 15px;"><?php echo htmlspecialchars($row['naslov']); ?></h4>
                        <p style="font-size: 1em; color: #555;"><?php echo htmlspecialchars($row['sazetak']); ?></p>
                        <p><a class="btn btn-light w-50" href="clanak.php?id=<?php echo $row['id']; ?>">Pročitaj više</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

</div>


        
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_footer.html" ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
