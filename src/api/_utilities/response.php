<?php

function esegui_redirect($percorso)
{
    $schema = !isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] == "" ? "http" : "https";
    $host = "localhost";
    $porta = $_SERVER["SERVER_PORT"];
    $url = $schema . "://" . $host . ":" . $porta;

    header("Location: " . $url . $percorso);
    exit();
}

function esci_con_stato($stato, $messaggio = "", $redirect = false)
{
    if ($redirect) {
        $referer = $_SERVER["HTTP_REFERER"];
        $datiUrl = parse_url($referer);
        $percorso = $datiUrl["path"];
        $messaggioCodificato = urlencode($messaggio);
        esegui_redirect("$percorso?messaggio_errore=$messaggioCodificato");
    } else {
        http_response_code($stato);
        echo $messaggio;
    }

    exit();
}

function stampa_json($dati)
{
    header("Content-Type: application/json");
    echo json_encode($dati);
}
