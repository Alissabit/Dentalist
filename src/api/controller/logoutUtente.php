<?php
require_once __DIR__ . "/../_utilities/sessione.php";
require_once __DIR__ . "/../_utilities/response.php";

session_start();
if (utente_autenticato()) {
    chiudi_sessione();
}

esegui_redirect("/login");

?>
