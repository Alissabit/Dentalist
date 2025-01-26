<?php
require_once __DIR__ . "/../api/_utilities/sessione.php";
require_once __DIR__ . "/../api/_utilities/response.php";
require_once __DIR__ . "/../_utilities-condivise/template.php";
require_once __DIR__ . "/../_utilities-condivise/form.php";

session_start();
if (!utente_autenticato()) {
    esegui_redirect("/login");
}
?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Le Mie Visite"); ?>
    <body>
        <?php inserisci_header(); ?>

        <div class="container mt-5">
            <h1 class="text-center">Le Mie Visite</h1>
            <div class="my-5">
                <!-- Spazio vuoto per future implementazioni -->
            </div>
        </div>

        <?php inserisci_footer(); ?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>