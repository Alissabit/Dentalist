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
    <?php inserisci_head("Home"); ?>
    <body>
        <?php inserisci_header(); ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="media">
                        <img src="/_utilities-condivise/immagini/Copertina.jpg" class="align-self-start mr-3 img-fluid" alt="Clinica Dentistica" style="max-width: 50%;">
                        <div class="media-body">
                            <h1>Sorridi grazie a Dentalist!</h1>
                            <p>La nostra missione è prenderci cura del vostro <b>sorriso</b> con professionalità e dedizione. Offriamo una vasta gamma di servizi per soddisfare tutte le vostre esigenze dentistiche, utilizzando le tecnologie più avanzate e un approccio personalizzato per ogni paziente. Il nostro team di esperti è qui per garantirvi il miglior trattamento possibile, in un ambiente accogliente e confortevole.</p>
                            <p>Presso la nostra clinica, ci impegniamo a fornire un'attenzione particolare a ogni dettaglio, assicurandoci che ogni visita sia un'esperienza positiva e senza stress. <b>La vostra salute orale</b> è la nostra priorità, e lavoriamo costantemente per migliorare i nostri servizi.</p>
                            <p>Il nostro obiettivo è farvi sentire a vostro agio e sicuri durante ogni fase del trattamento. <b>La vostra soddisfazione</b> è il nostro successo, e ci dedichiamo a costruire relazioni di fiducia con i nostri pazienti. Venite a scoprire come possiamo aiutarvi a raggiungere e mantenere un sorriso sano e splendente.</p>
                            <a href="prenotazione.html" class="btn btn-primary">Prenota un Appuntamento</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="odontoiatria-tab" data-bs-toggle="tab" href="#odontoiatria" role="tab" aria-controls="odontoiatria" aria-selected="true">Odontoiatria</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="igiene-tab" data-bs-toggle="tab" href="#igiene" role="tab" aria-controls="igiene" aria-selected="false">Igiene ed Estetica Orale</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="odontoiatria" role="tabpanel" aria-labelledby="odontoiatria-tab">
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
                                            <p class="card-text">Trattamenti per la correzione della posizione dei denti o disallineamento tramite mascherine mobili o apparecchi fissi.</p>
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
                                            <p class="card-text">Trattamenti per la cura delle malattie delle gengive, dolori e/o sanguinamento gengivale, ritrazione o gonfiore gengivale.</p>
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
                            </div>
                        </div>
                        <div class="tab-pane fade" id="igiene" role="tabpanel" aria-labelledby="igiene-tab">
                            <div class="row my-4">
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
                                            <p class="card-text">Le faccette dentali estetiche sono piccole ricostruzioni non invasive, utili per migliorare forma e colore dei denti e per rendere più armonioso il vostro sorriso.</p>
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
    </body