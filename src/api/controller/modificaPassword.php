<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_modelli/utenti.php";
require_once __DIR__ . "/../_utilities/validazioni.php";
require_once __DIR__ . "/../_utilities/costanti.php";

autorizza([get_profilo_utente_db(), get_profilo_admin_db()]);

$validatore = new Validatore("form-modifica-password", true);
$validatore->valida_dati_input();

$id = $_SESSION["id"];
$vecchia_password = $_POST["vecchia_password"];
$nuova_password = $_POST["nuova_password"];

$connessione = new ConnessioneDB();
$modelloUtenti = new ModelloUtente($connessione);

if (
    !$modelloUtenti->modificaPassword($id, $vecchia_password, $nuova_password)
) {
    esci_con_stato(400, "La password attuale non è corretta", true);
} else {
    esegui_redirect("/profilo");
}
?>
