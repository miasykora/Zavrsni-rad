<?php         
session_start();
include 'connect.php';

$notice = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT id, ime, prezime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $ime, $prezime, $hashed_password, $razina);
        mysqli_stmt_fetch($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {

            if (password_verify($lozinka, $hashed_password)) {
                $_SESSION['korisnicko_ime'] = $korisnicko_ime;
                $_SESSION['razina'] = $razina;
                $_SESSION['ime'] = $ime;
                $_SESSION['prezime'] = $prezime;

                if ($razina == 1) {
                    header('Location: administracija.php');
                    $_SESSION['admin'] = 1;
                }
                else header('Location: '.ABSOLUTE_PATH);
                
                exit();

            } else {
                $msg = 'Neispravno korisničko ime ili lozinka.';
            }
        } else {
            $msg = 'Neispravno korisničko ime ili lozinka.';
        }
    }
    mysqli_close($dbc);
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_header.php" ?>

    <main class="container mt-4">
        <h2>Prijava</h2>                    
        <form action="prijava.php" method="POST">
            <div class="form-group">
                <label for="korisnicko_ime">Korisničko ime:</label>
                <input type="text" class="form-control" id="korisnicko_ime" name="korisnicko_ime" required>
            </div>
            <div class="form-group">
                <label for="lozinka">Lozinka:</label>
                <input type="password" class="form-control" id="lozinka" name="lozinka" required>
            </div>
            
            <?php if (isset($msg)) echo '<div class="alert alert-danger alert-dismissible fade show my-3">' . $msg . '</div>'; ?>

            <button type="submit" class="btn btn-primary">Prijavi se</button>
            <a href="registracija.php" class="btn btn-secondary">Registracija</a>
        </form>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/zavrsni/partial/_footer.html" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
