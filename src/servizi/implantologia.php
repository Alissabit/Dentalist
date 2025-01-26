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
        <?php inserisci_head("Implantologia"); ?>
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
                            <h1>Implantologia</h1>
                            <p>Offriamo soluzioni avanzate per la sostituzione di denti mancanti con <b>impianti dentali</b>. Gli impianti sono radici dentali artificiali che vengono inserite nell'osso mascellare per supportare denti sostitutivi. I nostri impianti dentali offrono una soluzione <b>stabile</b> e <b>duratura</b>, migliorando sia la funzionalità che l'estetica del vostro sorriso.</p>
                            <p>Presso la nostra clinica, utilizziamo tecnologie all'avanguardia e materiali di alta qualità per garantire un successo che dura nel tempo. Il nostro team di esperti vi guiderà attraverso ogni fase del trattamento, assicurandosi che siate completamente soddisfatti del risultato finale. La <b>vostra soddisfazione</b> è la nostra priorità, e ci impegniamo a fornirvi un servizio eccellente.</p>
                            <a href="prenotazione.html" class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/Impiantologia.jpg" class="img-fluid" alt="Impiantologia">
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