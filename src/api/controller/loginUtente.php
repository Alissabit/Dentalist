<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

session_start();
if (utente_autenticato()) {
    esci_con_stato(403);
}

$validatore = new Validatore("form-login", true);
$validatore->valida_dati_input();

$username = $_POST["username"];
$password = $_POST["password"];

$connessione = new ConnessioneDB();
$modelloUtenti = new ModelloUtente($connessione);

$utente = $modelloUtenti->loginUtente($username, $password);

if (!$utente) {
    esci_con_stato(401, "Combinazione Email/CF e password non valida", true);
}

nuova_sessione(
    $utente["id"],
    $utente["nome"],
    $utente["cognome"],
    $utente["cf"],
    $utente["email"],
    $utente["profilo"],
    $utente["indirizzo"],
    $utente["telefono"]
);

esegui_redirect("/home");
