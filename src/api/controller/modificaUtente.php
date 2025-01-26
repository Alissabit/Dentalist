<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

autorizza([get_profilo_utente_db()]);

$validatore = new Validatore("form-modifica-utente", true);
$validatore->valida_dati_input();

$id = $_SESSION["id"];
$email = $_POST["email"];
$indirizzo = $_POST["indirizzo"];
$telefono = $_POST["telefono"];

$connessione = new ConnessioneDB();
$modelloUtenti = new ModelloUtente($connessione);

if ($modelloUtenti->modificaUtente($id, $email, $indirizzo, $telefono)) {
    $_SESSION["email"] = $email;
    $_SESSION["indirizzo"] = $indirizzo;
    $_SESSION["telefono"] = $telefono;

    esegui_redirect("/profilo");
} else {
    esci_con_stato(
        400,
        "L'indirizzo email '$email' è già in uso da un altro utente",
        true
    );
}

?>
