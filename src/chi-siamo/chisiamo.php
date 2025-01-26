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
    <?php inserisci_head("Chi Siamo"); ?>
    <body>
        <?php inserisci_header(); ?>

        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">10,000+ Pazienti Soddisfatti</h5>
                            <p class="card-text">Abbiamo aiutato oltre 10,000 pazienti a raggiungere una salute orale ottimale.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">15 Esperti</h5>
                            <p class="card-text">Il nostro team è composto da 15 esperti nel campo dell'odontoiatria.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">20 Anni di Esperienza</h5>
                            <p class="card-text">Fondata nel 2005, Dentalist ha oltre 20 anni di esperienza nel settore.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="media">
                        <img src="/_utilities-condivise/immagini/copertina.jpg" class="align-self-start mr-3 img-fluid" alt="Clinica Dentistica" style="max-width: 50%;">
                        <div class="media-body">
                            <h1>Chi Siamo ?</h1>
                            <p>Benvenuti da Dentalist! La nostra missione è prenderci cura del vostro sorriso con professionalità e dedizione. Fondata nel 2005, la nostra clinica ha aiutato oltre <b>10,000 pazienti</b> a raggiungere e mantenere una salute orale ottimale.</p>
                            <p>Il nostro team è composto da <b>15 esperti</b> nel campo dell'odontoiatria, ognuno con anni di esperienza e una passione per l'eccellenza. Utilizziamo le tecnologie più avanzate per offrire trattamenti personalizzati e di alta qualità.</p>
                            <p>Presso Dentalist, crediamo che ogni paziente meriti un'attenzione particolare. Ecco alcuni dei nostri punti salienti:</p>
                            <ul>
                                <li><b>Servizi Completi:</b> Offriamo una gamma completa di servizi dentali, dalla prevenzione alla chirurgia avanzata.</li>
                                <li><b>Ambiente Accogliente:</b> La nostra clinica è progettata per farvi sentire a vostro agio e rilassati.</li>
                                <li><b>Innovazione Continua:</b> Investiamo costantemente in nuove tecnologie per migliorare i nostri trattamenti.</li>
                            </ul>
                            <p>Venite a scoprire come possiamo aiutarvi a raggiungere e mantenere un sorriso sano e splendente. La vostra soddisfazione è il nostro successo!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php inserisci_footer(); ?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cards = document.querySelectorAll('.card');
                cards.forEach(card => {
                    card.addEventListener('mouseover', function() {
                        card.classList.add('shadow-lg');
                    });
                    card.addEventListener('mouseout', function() {
                        card.classList.remove('shadow-lg');
                    });
                });
            });
        </script>
        <style>
            .hover-card:hover {
                transform: scale(1.05);
                transition: transform 0.3s ease;
            }
        </style>
    </body>
</html>