<?php
require_once __DIR__ . "/../_utilities-condivise/form.php";
require_once __DIR__ . "/../api/_utilities/sessione.php";
require_once __DIR__ . "/../api/_utilities/response.php";
require_once __DIR__ . "/../_utilities-condivise/template.php";
require_once __DIR__ . "/../api/_utilities/costanti.php";

autorizza([get_profilo_admin_db()]);

?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Modifica Dati Utente"); ?>
    <body>
        <form method="POST" action="/api/controller/modificaUtente.php" id="form-modifica-utente-admin">
            <?php input_text(
                "indirizzo",
                "Indirizzo",
                $_SESSION["indirizzo"]
            ); ?>
            <?php input_text("telefono", "Telefono", $_SESSION["telefono"]); ?>
            <?php input_email("email", "Email", $_SESSION["email"]); ?>
            <!-- Completare con gli input mancanti: nome cognome e cf-->
            <?php bottone_submit("Modifica"); ?>
        </form> 
    </body>
</html>