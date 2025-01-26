<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_modelli/prenotazione.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

autorizza([get_profilo_admin_db(), get_profilo_utente_db()]);

$validatore = new Validatore("form-prenotazione", true);
$validatore->valida_dati_input();

$visita = $_POST["id_visita"];
$data = $_POST["data"];
$orario = $_POST["orario"];
$utente = $_SESSION["id"];

$connessione = new ConnessioneDB();
$modelloPrenotazione = new ModelloPrenotazione($connessione);

$prenotazione = $modelloPrenotazione->creaPrenotazione(
    $utente,
    $visita,
    $data,
    $orario
);

esegui_redirect("/profilo");
