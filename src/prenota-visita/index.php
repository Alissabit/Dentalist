<?php
require_once __DIR__ . "/../_utilities-condivise/form.php";
require_once __DIR__ . "/../api/_utilities/sessione.php";
require_once __DIR__ . "/../api/_utilities/response.php";
require_once __DIR__ . "/../_utilities-condivise/template.php";

autorizza([get_profilo_admin_db(), get_profilo_utente_db()]);
?>

<!DOCTYPE html>
<html lang="en">
<?php inserisci_head("Prenota Visita"); ?>
<body>
    <?php inserisci_header(); ?>
    <div class="container mt-5">
        <h1 class="text-center">Prenota Visita</h1>
        <form method="POST" action="/api/controller/creaPrenotazione.php" id="form-prenotazione">
            <div class="mb-3">
                <label for="id_visita" class="form-label">Seleziona il tipo di visita</label>
                <select class="form-control" id="id_visita" name="id_visita" required>
                    <optgroup label="Odontoiatria">
                        <option value="Visita di controllo">Visita di controllo</option>
                        <option value="Visita d'urgenza">Visita d'urgenza</option>
                        <option value="Ortodonzia">Ortodonzia</option>
                        <option value="Parodontologia">Parodontologia</option>
                        <option value="Implantologia">Implantologia</option>
                        <option value="Protesi dentale">Protesi dentale</option>
                    </optgroup>
                    <optgroup label="Igiene ed estetica orale">
                        <option value="Pulizia dentale">Pulizia dentale</option>
                        <option value="Sbiancamento">Sbiancamento</option>
                        <option value="Faccette dentali">Faccette dentali</option>
                    </optgroup>
                </select>
            </div>
            <div class="mb-3">
                <?php input_date("data", "Seleziona la data"); ?>
            </div>
            <div class="mb-3">
                <label for="orario" class="form-label">Seleziona l'orario</label>
                <select class="form-control" id="orario" name="orario" required>
                    <option value="10:00:00">10:00 - 11:00</option>
                    <option value="11:00:00">11:00 - 12:00</option>
                    <option value="12:00:00">12:00 - 13:00</option>
                    <option value="14:00:00">14:00 - 15:00</option>
                    <option value="15:00:00">15:00 - 16:00</option>
                    <option value="16:00:00">16:00 - 17:00</option>
                </select>
            </div>
            <div id="loader-background"></div>
            <div id="loader">
                <h4 class="text-center">Stiamo elaborando la tua prenotazione</h4>
                <p class="text-center">Stai per essere indirizzato al tuo profilo, dove potrai avere un riepilogo delle tue prenotazioni</p>
                <div class="spinner"></div>
            </div>
            <div class="d-grid">
                <?php bottone_submit("Prenota"); ?>
            </div>
        </form>
        <div class="row mt-5">
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Hai bisogno di assistenza?</h4>
                    <p>Se hai problemi o domande, il nostro team di supporto è sempre a tua disposizione. Puoi contattarci telefonicamente al numero <strong>123-456-7890</strong> o inviarci un'email a <strong>supporto@example.com</strong>. Siamo qui per aiutarti con qualsiasi necessità tu possa avere, dalle prenotazioni alle modifiche del profilo.</p>
                    <hr>
                    <p class="mb-0">Non esitare a contattarci, siamo qui per te!</p>
                </div>
            </div>
        </div>
    </div>
    <?php inserisci_footer(); ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>