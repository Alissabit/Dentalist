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
    <?php inserisci_head("Servizi"); ?>
    <body>
        <?php inserisci_header(); ?>

        <div class="container mt-5">
            <h1 class="text-center">I Nostri Servizi</h1>
            <div class="row my-4">
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/visita-di-controllo.php"> 
                            <img src="/_utilities-condivise/immagini/VisitaDiControllo.jpg" class="card-img-top" alt="Visita di Controllo">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Visita di controllo</h5>
                            <p class="card-text">Prenota un controllo periodico per monitorare la salute dei denti e delle gengive.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/visita-d-urgenza.php">  
                            <img src="/_utilities-condivise/immagini/VisitadUrgenza.jpg" class="card-img-top" alt="Visita d'Urgenza">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Visita d'urgenza</h5>
                            <p class="card-text">Intervento rapido per risolvere problemi dentali acuti e dolore improvviso e persistente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/odontoiatrica.php">  
                            <img src="/_utilities-condivise/immagini/Odontoiatrica.jpg" class="card-img-top" alt="Odontoiatrica">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Ortodonzia</h5>
                            <p class="card-text">Trattamenti per la correzione della posizione dei denti o disallineamento tramite mascherine mobili o fissi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/parodontologia.php">  
                            <img src="/_utilities-condivise/immagini/Parodontolgia.jpg" class="card-img-top" alt="Parodontologia">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Parodontologia</h5>
                            <p class="card-text">Trattamenti per la cura delle malattie delle gengive, dolori e/o sanguinamento gengivale o ritrazione</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/impiantologia.php">  
                            <img src="/_utilities-condivise/immagini/Impiantologia.jpg" class="card-img-top" alt="Impiantologia">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Implantologia</h5>
                            <p class="card-text">Soluzioni avanzate per il recupero di uno o più denti tramite impianti fissi o ponti dentali.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/pulizia-dentale.php">   
                            <img src="/_utilities-condivise/immagini/PuliziaDentale.jpg" class="card-img-top" alt="Pulizia Dentale">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Pulizia Dentale</h5>
                            <p class="card-text">Una procedura fondamentale per mantenere una corretta igiene orale e prevenire problemi dentali.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/faccette-dentali.php">
                            <img src="/_utilities-condivise/immagini/FaccetteDentali.jpg" class="card-img-top" alt="Faccette Dentali">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Faccette Dentali</h5>
                            <p class="card-text">Le faccette dentali estetiche sono piccole ricostruzioni non invasive, utili per il colore</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card hover-card">
                        <a href="/../servizi/sbiancamento.php">
                            <img src="/_utilities-condivise/immagini/Sbiancamento.jpg" class="card-img-top" alt="Sbiancamento">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Sbiancamento</h5>
                            <p class="card-text">Trattamento estetico che renderà i vostri denti più bianchi, per un sorriso luminoso.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php inserisci_footer(); ?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .hover-card:hover {
                transform: scale(1.05);
                transition: transform 0.3s ease;
            }
        </style>
    </body>
</html>