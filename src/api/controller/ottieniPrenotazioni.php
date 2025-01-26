<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_modelli/prenotazione.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

autorizza([get_profilo_admin_db(), get_profilo_utente_db()]);
$utente = $_SESSION["id"];
$connessione = new ConnessioneDB();
$modelloPrenotazione = new ModelloPrenotazione($connessione);

$listaPrenotazioni = $modelloPrenotazione->ottieniPrenotazioniUtente($utente);

header("Content-Type: application/json");

// Converte l'array in formato JSON e lo invia
echo json_encode($listaPrenotazioni);
?>
