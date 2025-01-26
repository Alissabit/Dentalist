<?php

function segnala_errore($errore)
{
    $_SESSION["errore"] = $errore;
}

function leggi_errore()
{
    if (isset($_SESSION["errore"])) {
        $errore = $_SESSION["errore"];
        unset($_SESSION["errore"]);
        return $errore;
    } else {
        return null;
    }
}
