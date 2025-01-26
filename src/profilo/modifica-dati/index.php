<?php
require_once __DIR__ . "/../../_utilities-condivise/form.php";
require_once __DIR__ . "/../../api/_utilities/sessione.php";
require_once __DIR__ . "/../../api/_utilities/costanti.php";
require_once __DIR__ . "/../../api/_utilities/response.php";
require_once __DIR__ . "/../../_utilities-condivise/template.php";

autorizza([get_profilo_utente_db()]);
?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Modifica Dati"); ?>
    <body>
    <?php inserisci_header(); ?>
    <div class="container mt-5">
        <form method="POST" action="/api/controller/modificaUtente.php" id="form-modifica-utente">
            <?php input_text(
                "indirizzo",
                "Indirizzo",
                $_SESSION["indirizzo"]
            ); ?>
            <?php input_text("telefono", "Telefono", $_SESSION["telefono"]); ?>
            <?php input_email("email", "Email", $_SESSION["email"]); ?>
            <?php bottone_submit("Modifica"); ?>
        </form> 
    </div>
        <?php inserisci_footer(); ?>
    </body>
</html>