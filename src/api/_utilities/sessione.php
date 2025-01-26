<?php
require_once __DIR__ . "/response.php";

function nuova_sessione(
    $id,
    $nome,
    $cognome,
    $cf,
    $email,
    $profilo,
    $indirizzo,
    $telefono
) {
    session_destroy();
    session_start();
    $_SESSION["id"] = $id;
    $_SESSION["nome"] = $nome;
    $_SESSION["cognome"] = $cognome;
    $_SESSION["cf"] = $cf;
    $_SESSION["email"] = $email;
    $_SESSION["profilo"] = $profilo;
    $_SESSION["indirizzo"] = $indirizzo;
    $_SESSION["telefono"] = $telefono;
}

function utente_autenticato()
{
    return isset($_SESSION["id"]);
}

function autorizza($profiles)
{
    session_start();

    if (!utente_autenticato()) {
        esegui_redirect("/login");
    }

    if (!in_array($_SESSION["profilo"], $profiles)) {
        esci_con_stato(403);
    }
}

function chiudi_sessione()
{
    session_unset();
    session_destroy();
}
