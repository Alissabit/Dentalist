<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_modelli/prenotazione.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

autorizza([get_profilo_admin_db(), get_profilo_utente_db()]);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $connessione = new ConnessioneDB();
    $modelloPrenotazione = new ModelloPrenotazione($connessione);

    $modelloPrenotazione->cancellaPrenotazione($id);
} else {
    esci_con_stato(400);
}
?>

