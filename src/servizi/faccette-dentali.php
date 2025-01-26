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
        <?php inserisci_head("Faccette Dentali"); ?>
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
                            <h1>Faccette Dentali</h1>
                            <p>Le faccette dentali sono sottili lamine in ceramica che vengono applicate sulla superficie dei denti per migliorarne l'estetica. Questo trattamento è ideale per correggere imperfezioni come macchie, scheggiature, o piccoli disallineamenti. Le <b>faccette dentali</b> offrono un risultato naturale e duraturo, migliorando significativamente l'aspetto del vostro sorriso.</p>
                            <p>Presso la nostra clinica, utilizziamo materiali di alta qualità e tecniche avanzate per garantire faccette su misura che si adattano perfettamente ai vostri denti. Il nostro team di esperti vi guiderà attraverso ogni fase del trattamento, assicurandosi che siate completamente soddisfatti del risultato finale.La <b>vostra soddisfazione</b> è la nostra missione!</p>
                            <a href="prenotazione.html" class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                        <img src="/_utilities-condivise/immagini/FaccetteDentali.jpg" class="img-fluid" alt="Faccette Dentali">
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