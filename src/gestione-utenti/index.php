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
    <?php inserisci_head("Gestisci Utenti"); ?>
    <body>
        <?php inserisci_header(); ?>
        <div id="container">

        </div>
        <div id="container-2"></div>
    </body>
</html>

