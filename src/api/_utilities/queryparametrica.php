<?php
class ParametroQuery
{
    public $tipo;
    public $valore;

    public function __construct($tipo, $valore)
    {
        $this->tipo = $tipo;
        $this->valore = $valore;
    }
}

class QueryParametrica
{
    private $statement;

    /** @var ParametroQuery[] $parametri */
    private $parametri = [];

    public function __construct($statement)
    {
        $this->statement = $statement;
    }

    public function __destruct()
    {
        $this->statement->close();
    }

    private function aggiungi_parametro_interna($tipo, $valore)
    {
        $parametroQuery = new ParametroQuery($tipo, $valore);
        array_push($this->parametri, $parametroQuery);
    }

    public function aggiungi_parametro_int($valore)
    {
        $this->aggiungi_parametro_interna("i", $valore);
    }

    public function aggiungi_parametro_string($valore)
    {
        $valore_safe = htmlspecialchars($valore, ENT_HTML5);
        $this->aggiungi_parametro_interna("s", $valore_safe);
    }

    private function calcola_parametri()
    {
        $tipi = "";
        $valori = [];

        foreach ($this->parametri as $parametro) {
            $tipi .= $parametro->tipo;
            array_push($valori, $parametro->valore);
        }

        $this->statement->bind_param($tipi, ...$valori);
    }

    public function esegui_con_risultato(): array
    {
        $this->calcola_parametri();

        if ($this->statement->execute()) {
            $risultato_query = $this->statement->get_result();
            $righe = [];

            while ($riga = mysqli_fetch_assoc($risultato_query)) {
                $righe[] = $riga; // Aggiunge la riga all'array
            }
            return $righe;
        } else {
            esci_con_stato(500);
        }
    }

    public function esegui_senza_risultato()
    {
        $this->calcola_parametri();
        $this->statement->execute();
    }
}
