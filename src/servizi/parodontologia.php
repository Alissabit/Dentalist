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
        <?php inserisci_head("Parodontologia"); ?>
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
                            <h1>Parodontologia</h1>
                            <p>La parodontologia si occupa della cura delle malattie delle gengive e del tessuto di supporto dei denti. Questo ramo della odontoiatria è fondamentale per prevenire e trattare condizioni come la gengivite e la parodontite, che possono portare alla perdita dei denti se non trattate adeguatamente. Una buona <b>salute parodontale</b> è essenziale per mantenere un sorriso sano e funzionale.</p>
                            <p>Presso la nostra clinica, offriamo trattamenti avanzati per la cura delle malattie parodontali, utilizzando tecnologie moderne e approcci personalizzati. Il nostro team di esperti è qui per assicurarvi il miglior trattamento possibile, aiutandovi a mantenere gengive sane e forti. <b>La vostra salute orale</b> è la nostra priorità, e ci impegniamo a fornirvi un servizio di alta qualità.</p>
                            <a href="prenotazione.html" class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/Parodontolgia.jpg" class="img-fluid" alt="Parodontologia">
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