<?php
// Collegamento delle utilities necessarie
require_once __DIR__ . "/queryparametrica.php";
require_once __DIR__ . "/response.php";

// Classe che viene utilizzata per connettersi al Database
class ConnessioneDB
{
    // Parametri di connessione
    private $nome_host = "localhost";
    private $username = "dentalist";
    private $password = "k48whXFfeKsiOv4FhrLo";
    private $nome_db = "dentalist";

    private $connessione = null;

    // Viene effettuata la connessione -> Quando viene chiamato il costruttore viene effettuata la connessione al DB
    public function __construct()
    {
        $this->connessione = new mysqli(
            $this->nome_host,
            $this->username,
            $this->password,
            $this->nome_db
        );
        // Gestione dell'errore di connessione
        if ($this->connessione->connect_error) {
            esci_con_stato(500);
        }
    }

    // Interrompe la connessione automaticamente alla fine dello script
    public function __destruct()
    {
        mysqli_close($this->connessione);
    }

    // Crea un'istanza della classe query parametrica, usando la connessione inizializzata nel costruttore
    public function crea_query_parametrica($query)
    {
        $statement = $this->connessione->prepare($query);
        $queryParametrica = new QueryParametrica($statement);
        return $queryParametrica;
    }
}
