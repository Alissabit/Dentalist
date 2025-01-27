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
    <head>
        <?php inserisci_head("Visita d'Urgenza"); ?>
        <style>
            .card {
                margin-bottom: 20px; /* Aggiungi margine inferiore */
            }
            .media {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .media-body {
                flex: 1;
                margin-right: 20px;
            }
            .media img {
                max-width: 50%;
                height: auto;
            }
        </style>
    </head>
    <body>
        <?php inserisci_header(); ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="media">
                        <div class="media-body">
                            <h1>Visita d'Urgenza</h1>
                            <p>La visita d'urgenza è pensata per affrontare problemi dentali acuti e dolorosi che richiedono un intervento immediato. Il nostro team di esperti è pronto a fornire cure rapide ed efficaci per alleviare il dolore e risolvere il problema. Un <b>intervento tempestivo</b> può prevenire complicazioni e migliorare rapidamente la vostra condizione.</p>
                            <p>Presso la nostra clinica, siamo attrezzati per gestire una vasta gamma di emergenze dentali, dalle infezioni ai traumi dentali. Utilizziamo tecnologie avanzate per garantire diagnosi accurate e trattamenti efficaci. La <b>vostra salute orale</b> è la nostra priorità, e ci impegniamo a fornirvi il miglior servizio possibile anche in situazioni di emergenza.</p>
                            <a href="/prenota-visita"  class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/VisitadUrgenza.jpg" class="img-fluid" alt="Visita d'Urgenza">
                    </div>
                </div>
            </div>
        </div>

        <?php inserisci_footer(); ?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const btn = document.querySelector('.btn-primary');
                btn.addEventListener('mouseover', function() {
                    btn.classList.add('btn-success');
                });
                btn.addEventListener('mouseout', function() {
                    btn.classList.remove('btn-success');
                });
            });
        </script>
    </body>
</html>