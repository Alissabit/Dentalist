<?php
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_utilities/costanti.php";

class ModelloUtente
{
    private ConnessioneDB $connessione;

    function __construct(ConnessioneDB $connessione)
    {
        $this->connessione = $connessione;
    }

    private function codifica_password($password)
    {
        return hash("sha256", $password);
    }

    function recuperaUtenti()
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT id, nome, cognome, cf, email, profilo, indirizzo, telefono" .
                " FROM utente WHERE profilo=?"
        );
        $query_parametrica->aggiungi_parametro_string(get_profilo_utente_db());

        $utenti = $query_parametrica->esegui_con_risultato();
        return $utenti;
    }

    function creaUtente(
        $nome,
        $cognome,
        $cf,
        $email,
        $password,
        $profilo,
        $indirizzo,
        $telefono
    ) {
        // controllo cf duplicato
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT COUNT(id) AS trovato FROM utente WHERE cf=? "
        );
        $query_parametrica->aggiungi_parametro_string($cf);

        $trovato = $query_parametrica->esegui_con_risultato()[0]["trovato"];
        if ($trovato != 0) {
            return 1;
        }

        // controllo email duplicata
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT COUNT(id) AS trovato FROM utente WHERE email=? "
        );
        $query_parametrica->aggiungi_parametro_string($email);

        $trovato = $query_parametrica->esegui_con_risultato()[0]["trovato"];
        if ($trovato != 0) {
            return 2;
        }

        // creazione nuovo utente
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "INSERT INTO utente(nome, cognome, cf, email, password, profilo, indirizzo, telefono)" .
                " VALUES(?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $query_parametrica->aggiungi_parametro_string($nome);
        $query_parametrica->aggiungi_parametro_string($cognome);
        $query_parametrica->aggiungi_parametro_string($cf);
        $query_parametrica->aggiungi_parametro_string($email);
        $query_parametrica->aggiungi_parametro_string(
            $this->codifica_password($password)
        );
        $query_parametrica->aggiungi_parametro_string($profilo);
        $query_parametrica->aggiungi_parametro_string($indirizzo);
        $query_parametrica->aggiungi_parametro_string($telefono);

        $query_parametrica->esegui_senza_risultato();
        return 0;
    }

    function modificaUtente($id, $email, $indirizzo, $telefono)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT COUNT(id) AS trovato FROM utente WHERE email=? AND id!=? "
        );

        $query_parametrica->aggiungi_parametro_string($email);
        $query_parametrica->aggiungi_parametro_int($id);

        $trovato = $query_parametrica->esegui_con_risultato()[0]["trovato"];
        if ($trovato != 0) {
            return false;
        }

        $query_parametrica = $this->connessione->crea_query_parametrica(
            "UPDATE utente SET email=?, indirizzo=?, telefono=? WHERE id=?"
        );

        $query_parametrica->aggiungi_parametro_string($email);
        $query_parametrica->aggiungi_parametro_string($indirizzo);
        $query_parametrica->aggiungi_parametro_string($telefono);
        $query_parametrica->aggiungi_parametro_int($id);

        $query_parametrica->esegui_senza_risultato();
        return true;
    }

    function modificaUtenteAdmin(
        $id,
        $nome,
        $cognome,
        $cf,
        $email,
        $indirizzo,
        $telefono
    ) {
        // controllo cf duplicato
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT COUNT(id) AS trovato FROM utente WHERE cf=? "
        );
        $query_parametrica->aggiungi_parametro_string($cf);

        $trovato = $query_parametrica->esegui_con_risultato()[0]["trovato"];
        if ($trovato != 0) {
            return 1;
        }

        // controllo email duplicata
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT COUNT(id) AS trovato FROM utente WHERE email=? "
        );
        $query_parametrica->aggiungi_parametro_string($email);

        $trovato = $query_parametrica->esegui_con_risultato()[0]["trovato"];
        if ($trovato != 0) {
            return 2;
        }

        $query_parametrica = $this->connessione->crea_query_parametrica(
            "UPDATE utente SET cf=?, nome=?, cognome=?, email=?, indirizzo=?, telefono=? WHERE id=?"
        );

        $query_parametrica->aggiungi_parametro_string($cf);
        $query_parametrica->aggiungi_parametro_string($nome);
        $query_parametrica->aggiungi_parametro_string($cognome);
        $query_parametrica->aggiungi_parametro_string($email);
        $query_parametrica->aggiungi_parametro_string($indirizzo);
        $query_parametrica->aggiungi_parametro_string($telefono);
        $query_parametrica->aggiungi_parametro_int($id);

        $query_parametrica->esegui_senza_risultato();
        return true;
    }

    function modificaPassword($id, $vecchia_password, $nuova_password)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT COUNT(id) AS trovato FROM utente WHERE id=? AND password=?"
        );

        $query_parametrica->aggiungi_parametro_int($id);
        $query_parametrica->aggiungi_parametro_string(
            $this->codifica_password($vecchia_password)
        );

        $trovato = $query_parametrica->esegui_con_risultato()[0]["trovato"];
        if ($trovato != 1) {
            return false;
        }

        $query_parametrica = $this->connessione->crea_query_parametrica(
            "UPDATE utente SET password=? WHERE id=?"
        );

        $query_parametrica->aggiungi_parametro_string(
            $this->codifica_password($nuova_password)
        );
        $query_parametrica->aggiungi_parametro_int($id);

        $query_parametrica->esegui_senza_risultato();
        return true;
    }

    function eliminaUtente($id)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "DELETE FROM utente WHERE id=?"
        );
        $query_parametrica->aggiungi_parametro_int($id);

        $query_parametrica->esegui_senza_risultato();
    }

    function loginUtente($username, $password)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT * FROM utente WHERE (cf=? OR email=?) AND password=?"
        );
        $query_parametrica->aggiungi_parametro_string($username);
        $query_parametrica->aggiungi_parametro_string($username);
        $query_parametrica->aggiungi_parametro_string(
            $this->codifica_password($password)
        );

        $risultato = $query_parametrica->esegui_con_risultato();

        if (count($risultato) == 0) {
            return false;
        } else {
            return $risultato[0];
        }
    }
}
