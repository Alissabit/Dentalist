<?php
require_once __DIR__ . "/../api/_utilities/sessione.php";
require_once __DIR__ . "/../api/_utilities/response.php";
require_once __DIR__ . "/../_utilities-condivise/template.php";
require_once __DIR__ . "/../_utilities-condivise/form.php";

session_start();
if (!utente_autenticato()) {
    esegui_redirect("/login");
}

$nome = $_SESSION["nome"];
$cognome = $_SESSION["cognome"];
$email = $_SESSION["email"];
$telefono = $_SESSION["telefono"];
$indirizzo = $_SESSION["indirizzo"];
?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Profilo"); ?>
    <body>
        <?php inserisci_header(); ?>

        <div class="container mt-5">
            <h1 class="text-center">Profilo di <?php echo $nome . " " . $cognome; ?></h1>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informazioni Personali</h5>
                            <p class="card-text"><strong>Nome:</strong> <?php echo $nome; ?></p>
                            <p class="card-text"><strong>Cognome:</strong> <?php echo $cognome; ?></p>
                            <p class="card-text"><strong>Email:</strong> <?php echo $email; ?></p>
                            <p class="card-text"><strong>Telefono:</strong> <?php echo $telefono; ?></p>
                            <p class="card-text"><strong>Indirizzo:</strong> <?php echo $indirizzo; ?></p>
                            <div class="d-grid gap-2">
                                <a href="/profilo/modifica-dati" class="btn btn-primary btn-sm">Modifica Dati</a>
                                <a href="/profilo/modifica-password" class="btn btn-outline-dark btn-sm">Modifica Password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="text-center">Le mie prenotazioni</h4>
                    <div id="container"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Hai bisogno di assistenza?</h4>
                        <p>Se hai problemi o domande, il nostro team di supporto è sempre a tua disposizione. Puoi contattarci telefonicamente al numero <strong>123-456-7890</strong> o inviarci un'email a <strong>supporto@example.com</strong>. Siamo qui per aiutarti con qualsiasi necessità tu possa avere, dalle prenotazioni alle modifiche del profilo.</p>
                        <hr>
                        <p class="mb-0">Non esitare a contattarci, siamo qui per te!</p>
                    </div>
                </div>
            </div>
        </div>

        <?php inserisci_footer(); ?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>