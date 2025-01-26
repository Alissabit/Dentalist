<?php
require_once __DIR__ . "/../../_utilities-condivise/form.php";
require_once __DIR__ . "/../../api/_utilities/sessione.php";
require_once __DIR__ . "/../../api/_utilities/costanti.php";
require_once __DIR__ . "/../../api/_utilities/response.php";
require_once __DIR__ . "/../../_utilities-condivise/template.php";

autorizza([get_profilo_utente_db(), get_profilo_admin_db()]);
?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Modifica Password"); ?>
    <body>
        <?php inserisci_header(); ?>
        <div class="container mt-5">
        <form method="POST" action="/api/controller/modificaPassword.php" id="form-modifica-password">
            <?php input_password("vecchia_password", "Password attuale"); ?>
            <?php input_password("nuova_password", "Nuova password"); ?>
            <?php bottone_submit("Modifica"); ?>
        </form> 
        </div>
        <?php inserisci_footer(); ?>
    </body>
</html>