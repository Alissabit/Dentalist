<?php
require_once __DIR__ . "/../_utilities/connessione-db.php";
require_once __DIR__ . "/../_utilities/costanti.php";

// Il modello prenotazioni fornisce gli strumenti necessari per effettuare operazioni di CRUD sulla tabella prenotazioni
class ModelloPrenotazione
{
    // Il modello apre la connessione al database utilizzando l'apposita classe
    private ConnessioneDB $connessione;

    function __construct(ConnessioneDB $connessione)
    {
        $this->connessione = $connessione;
    }
    // Crea una prenotazione
    function creaPrenotazione($utente, $visita, $giorno, $orario)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "INSERT INTO prenotazione(id_utente, visita, giorno, orario)" .
                " VALUES(?, ?, ?, ?)"
        );
        $query_parametrica->aggiungi_parametro_int($utente);
        $query_parametrica->aggiungi_parametro_string($visita);
        $query_parametrica->aggiungi_parametro_string($giorno);
        $query_parametrica->aggiungi_parametro_string($orario);

        $query_parametrica->esegui_senza_risultato();
        return true;
    }
    // Cancella una prenotazione
    function cancellaPrenotazione($id_prenotazione)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "DELETE FROM prenotazione WHERE id = ?"
        );
        $query_parametrica->aggiungi_parametro_int($id_prenotazione);
        $query_parametrica->esegui_senza_risultato();
        return true;
    }
    // Ottiene la lista di tutte le prenotazioni associate a un utente
    function ottieniPrenotazioniUtente($utente)
    {
        $query_parametrica = $this->connessione->crea_query_parametrica(
            "SELECT * FROM prenotazione WHERE id_utente = ?"
        );
        $query_parametrica->aggiungi_parametro_int($utente);

        $prenotazioni = $query_parametrica->esegui_con_risultato();
        return $prenotazioni;
    }
}
