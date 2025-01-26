<?php
require_once __DIR__ . "/../_utilities-condivise/form.php";
require_once __DIR__ . "/../api/_utilities/sessione.php";
require_once __DIR__ . "/../api/_utilities/response.php";
require_once __DIR__ . "/../_utilities-condivise/template.php";

session_start();
if (utente_autenticato()) {
    esegui_redirect("/home");
}
?>

<!DOCTYPE html>
<html lang="it">
    <?php inserisci_head("Login"); ?>

    <body>
        <div class="container">
            <h1 class="text-center my-5">Login</h1>
            <form method="POST" action="/api/controller/loginUtente.php" id="form-login">
                <div class="mb-3">
                    <?php input_text("username", "Email o Codice Fiscale"); ?>
                </div>
                <div class="mb-3">
                    <?php input_password("password", "Password"); ?>
                </div>
                <div class="d-grid">
                    <?php bottone_submit("Accedi"); ?>
                    <a href="/registrazione" class="btn btn-secondary">Registrati</a>
                </div>
            </form> 
        </div>

        <!-- Inclusione di Bootstrap JS e Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>