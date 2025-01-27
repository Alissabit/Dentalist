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
        <?php inserisci_head("Sbiancamento"); ?>
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
                            <h1>Sbiancamento</h1>
                            <p>Lo sbiancamento dentale è un trattamento estetico che mira a rendere i vostri denti più bianchi e luminosi. Utilizziamo tecniche avanzate e prodotti di alta qualità per garantire risultati sicuri ed efficaci.</p>
                            <p>Presso la nostra clinica, offriamo diverse opzioni di sbiancamento dentale, tra cui trattamenti in studio e kit per sbiancamento domiciliare. Il nostro team di esperti vi guiderà nella scelta del metodo più adatto alle vostre esigenze, per garantirvi un sorriso semplicemente smagliante!. La <b>vostra soddisfazione</b> è la nostra priorità, e ci impegniamo a fornirvi un servizio di alta qualità.</p>
                            <a href="/prenota-visita"  class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/Sbiancamento.jpg" class="img-fluid" alt="Sbiancamento">
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