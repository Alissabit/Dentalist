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

$validatore = new Validatore("form-registrazione", true);
$validatore->valida_dati_input();

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$cf = $_POST["cf"];
$email = $_POST["email"];
$password = $_POST["password"];
$telefono = $_POST["telefono"];
$indirizzo = $_POST["indirizzo"];

$connessione = new ConnessioneDB();
$modelloUtenti = new ModelloUtente($connessione);

$statoOperazione = $modelloUtenti->creaUtente(
    $nome,
    $cognome,
    $cf,
    $email,
    $password,
    get_profilo_utente_db(),
    $indirizzo,
    $telefono
);

switch ($statoOperazione) {
    case 1: // CF duplicato
        esci_con_stato(400, "Il codice fiscale '$cf' è già in uso", true);
        break;

    case 2: // Email duplicata
        esci_con_stato(400, "L'indirizzo email '$email' è già in uso", true);
        break;
}

esegui_redirect("/login");
