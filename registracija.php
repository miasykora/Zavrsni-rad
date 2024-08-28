<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $lozinkaPonovo = $_POST['lozinkaPonovo'];
    $razina = $_POST['razina'];

    if ($lozinka === $lozinkaPonovo) {
        $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);

        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $msg = 'Korisničko ime već postoji!';
        } else {
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $korisnicko_ime, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }
        mysqli_close($dbc);
    } else {
        $msg = 'Lozinke se ne podudaraju!';
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_header.php" ?>

    <main class="container mt-4">
        <h2>Registracija</h2>
        <?php if (isset($registriranKorisnik) && $registriranKorisnik): ?>
            <p>Korisnik je uspješno registriran!</p>
        <?php else: ?>
            <form action="registracija.php" method="POST">
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" class="form-control" id="ime" name="ime" required>
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" class="form-control" id="prezime" name="prezime" required>
                </div>
                <div class="form-group">
                    <label for="korisnicko_ime">Korisničko ime:</label>
                    <input type="text" class="form-control" id="korisnicko_ime" name="korisnicko_ime" required>
                    <?php if (isset($msg)) echo '<div class="error">' . $msg . '</div>'; ?>
                </div>
                <div class="form-group">
                    <label for="lozinka">Lozinka:</label>
                    <input type="password" class="form-control" id="lozinka" name="lozinka" required>
                </div>
                <div class="form-group">
                    <label for="lozinkaPonovo">Ponovite lozinku:</label>
                    <input type="password" class="form-control" id="lozinkaPonovo" name="lozinkaPonovo" required>
                </div>
                <div class="form-group">
                    <label>Razina korisnika:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="razina" id="korisnik" value="0" checked>
                        <label class="form-check-label" for="korisnik">Korisnik</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="razina" id="administrator" value="1">
                        <label class="form-check-label" for="administrator">Administrator</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registriraj se</button>
            </form>
        <?php endif; ?>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_footer.html" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
