<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Putovanja Online</title>
    <link rel="stylesheet" href="content/styles/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo ABSOLUTE_PATH?>">Putovanja Online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="unos.php">Unos novosti</a></li>
            <?php /*<li class="nav-item"><a class="nav-link" href="administracija.php?fn=2">Administracija</a></li> */?>
            <li class="nav-item"><a class="nav-link" href="o_nama.php">O nama</a></li>
            <?php if(isset($_SESSION['korisnicko_ime'])): ?>
                <li class="nav-item"><a class="nav-link" href="odjava.php"><?php echo $_SESSION['korisnicko_ime']?> (odjavi)</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="prijava.php">Prijava</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1 && !isset($admin)) { ?>
    <a href="<?php echo ABSOLUTE_PATH?>/administracija.php" class="btn btn-warning btn-admin">ADMINISTRACIJA</a>    
<?php }?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
