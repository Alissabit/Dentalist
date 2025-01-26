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
        <?php inserisci_head("Odontoiatrica"); ?>
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
                            <h1>Ortodonzia</h1>
                            <p>L’ortodonzia è una branca dell’odontoiatria che si occupa di prevenire, diagnosticare e trattare malposizioni dentali e disallineamenti della mascella. Presso la nostra clinica utilizziamo tecnologie all’avanguardia e offriamo soluzioni personalizzate, dai tradizionali <b>apparecchi fissi</b> agli innovativi <b>allineatori trasparenti</b>. Il nostro obiettivo è migliorare la funzionalità e l’estetica del sorriso, garantendo risultati duraturi e il massimo comfort per i nostri pazienti.</p>
                            <p>Affidatevi ai nostri specialisti per ritrovare l'armonia del vostro sorriso!</p>
                            <a href="prenotazione.html" class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/Odontoiatrica.jpg" class="img-fluid" alt="Ortodonzia">
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