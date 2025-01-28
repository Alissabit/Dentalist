<?php
require_once __DIR__ . "/../_utilities-condivise/form.php";
require_once __DIR__ . "/../api/_utilities/sessione.php";
require_once __DIR__ . "/../_utilities-condivise/template.php";
require_once __DIR__ . "/../api/_utilities/response.php";

session_start();
if (utente_autenticato()) {
    esegui_redirect("/home");
}
?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Registrazione"); ?>
    <body>
        <div class="container">
            <h1 class="text-center my-5">Registrazione ABC</h1>
            <form method="POST" action="/api/controller/creaUtente.php" id="form-registrazione">
                <div class="mb-2">
                    <?php input_text("nome", "Nome"); ?>
                </div>
                <div class="mb-2">
                    <?php input_text("cognome", "Cognome"); ?>
                </div>
                <div class="mb-2">
                    <?php input_text("cf", "CF"); ?>
                </div>
                <div class="mb-2">
                    <?php input_text("telefono", "Telefono"); ?>
                </div>
                <div class="mb-2">
                    <?php input_text("indirizzo", "Indirizzo"); ?>
                </div>
                <div class="mb-2">
                    <?php input_email("email", "Email"); ?>
                </div>
                <div class="mb-2">
                    <?php input_password("password", "Password"); ?>
                </div>
                <div class="d-grid">
                    <?php bottone_submit("Registrati"); ?>
                </div>
            </form> 
        </div>

        <!-- Inclusione di Bootstrap JS e Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>