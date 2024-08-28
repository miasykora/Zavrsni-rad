
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos novosti</title>
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
                <li class="nav-item"><a class="nav-link" href="#">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link" href="#">O nama</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mt-4">
        <h2>Unos nove vijesti ili proizvoda</h2>
        <form name="unos" action="skripta.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="naslov">Naslov:</label>
                <input type="text" class="form-control" id="naslov" name="naslov" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control" id="autor" name="autor" required>
            </div>
            <div class="form-group">
                <label for="sazetak">Kratki sažetak:</label>
                <textarea class="form-control" id="sazetak" name="sazetak" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="tekst">Tekst vijesti:</label>
                <textarea class="form-control" id="tekst" name="tekst" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="kategorija">Kategorija:</label>
                <select class="form-control" id="kategorija" name="kategorija" required>
                    <option value="Putovanja">Putovanja</option>
                    <option value="Ponude">Ponude</option>
                    <option value="Savjeti">Savjeti</option>
                </select>
            </div>
            <div class="form-group">
                <label for="slika">Odaberite sliku:</label>
                <input type="file" class="form-control-file" id="slika" name="slika" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="prikazi" name="prikazi">
                <label class="form-check-label" for="prikazi">Prikaži na stranici</label>
            </div>
            <button type="submit" class="btn btn-primary">Pošalji</button>
        </form>
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
