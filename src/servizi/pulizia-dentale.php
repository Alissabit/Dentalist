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
        <?php inserisci_head("Pulizia Dentale"); ?>
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
                            <h1>Pulizia Dentale</h1>
                            <p>La pulizia dentale è una procedura fondamentale per mantenere una corretta igiene orale e prevenire problemi dentali. Durante la pulizia dentale, i nostri esperti rimuovono la placca e il tartaro dai denti, riducendo il rischio di carie e malattie gengivali. Una <b>pulizia dentale regolare</b> aiuta a mantenere denti forti e gengive sane, migliorando anche l'aspetto del vostro sorriso.</p>
                            <p>Presso la nostra clinica, utilizziamo strumenti avanzati e tecniche moderne per garantire una pulizia dentale efficace e confortevole. Il nostro team di professionisti è qui per assicurarvi un'esperienza positiva e senza stress. La vostra <b>salute orale</b> è la nostra priorità, e ci impegniamo a fornirvi il miglior trattamento possibile.</p>
                            <a href="prenotazione.html" class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/PuliziaDentale.jpg" class="img-fluid" alt="Pulizia Dentale">
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