<?php 
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos novosti</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
        .error-border {
            border-color: red;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_header.php" ?>

    <main class="container mt-4">
        <h2>Unos nove vijesti ili proizvoda</h2>
        <form id="newsForm" name="unos" action="skripta.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="naslov">Naslov:</label>
                <input type="text" class="form-control" id="naslov" name="naslov">
                <div id="naslovError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" class="form-control" id="autor" name="autor">
            </div>
            <div class="form-group">
                <label for="sazetak">Kratki sažetak:</label>
                <textarea class="form-control" id="sazetak" name="sazetak" rows="2"></textarea>
                <div id="sazetakError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="tekst">Tekst vijesti:</label>
                <textarea class="form-control" id="tekst" name="tekst" rows="5"></textarea>
                <div id="tekstError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="kategorija">Kategorija:</label>
                <select class="form-control" id="kategorija" name="kategorija">
                    <option value="">Odaberite kategoriju</option>
                    <option value="Putovanja">Putovanja</option>
                    <option value="Ponude">Ponude</option>
                    <option value="Savjeti">Savjeti</option>
                </select>
                <div id="kategorijaError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="slika">Odaberite sliku:</label>
                <input type="file" class="form-control-file" id="slika" name="slika">
                <div id="slikaError" class="error"></div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="prikazi" name="prikazi">
                <label class="form-check-label" for="prikazi">Prikaži na stranici</label>
            </div>
            <button type="submit" class="btn btn-primary">Pošalji</button>
        </form>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_footer.html" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('newsForm').addEventListener('submit', function(event) {
            let isValid = true;

            document.querySelectorAll('.error').forEach(el => el.innerText = '');
            document.querySelectorAll('.form-control, .form-control-file, .form-check-input').forEach(el => el.classList.remove('error-border'));

            const naslov = document.getElementById('naslov');
            if (naslov.value.length < 5 || naslov.value.length > 30) {
                isValid = false;
                naslov.classList.add('error-border');
                document.getElementById('naslovError').innerText = 'Naslov mora imati između 5 i 30 znakova.';
            }
            const sazetak = document.getElementById('sazetak');
            if (sazetak.value.length < 10 || sazetak.value.length > 100) {
                isValid = false;
                sazetak.classList.add('error-border');
                document.getElementById('sazetakError').innerText = 'Kratki sažetak mora imati između 10 i 100 znakova.';
            }
            const tekst = document.getElementById('tekst');
            if (tekst.value.trim() === '') {
                isValid = false;
                tekst.classList.add('error-border');
                document.getElementById('tekstError').innerText = 'Tekst vijesti ne smije biti prazan.';
            }
            const kategorija = document.getElementById('kategorija');
            if (kategorija.value === '') {
                isValid = false;
                kategorija.classList.add('error-border');
                document.getElementById('kategorijaError').innerText = 'Kategorija mora biti odabrana.';
            }
            const slika = document.getElementById('slika');
            if (slika.files.length === 0) {
                isValid = false;
                slika.classList.add('error-border');
                document.getElementById('slikaError').innerText = 'Slika mora biti odabrana.';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
