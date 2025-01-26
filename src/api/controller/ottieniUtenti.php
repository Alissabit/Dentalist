<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

autorizza([get_profilo_admin_db()]);

$connessione = new ConnessioneDB();
$modelloUtenti = new ModelloUtente($connessione);

$listaUtenti = $modelloUtenti->recuperaUtenti();

header("Content-Type: application/json");

// Converte l'array in formato JSON e lo invia
echo json_encode($listaUtenti);
?>
