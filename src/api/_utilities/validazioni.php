<?php

require_once __DIR__ . "/response.php";

class Validatore
{
    private $validazioni;
    private $redirectSuErrore;

    function __construct($idForm, $redirectSuErrore = false)
    {
        $jsonStr = file_get_contents(
            __DIR__ . "/../../_validazioni-form/$idForm.json"
        );
        $this->validazioni = json_decode($jsonStr);
        $this->redirectSuErrore = $redirectSuErrore;
    }

    function valida_dati_input($usaGet = false)
    {
        foreach ($this->validazioni as $nomeInput => $validazioniInput) {
            $valoreInput = "";
            if ($usaGet && isset($_GET[$nomeInput])) {
                $valoreInput = $_GET[$nomeInput];
            } elseif ($usaGet == false && isset($_POST[$nomeInput])) {
                $valoreInput = $_POST[$nomeInput];
            }

            foreach ($validazioniInput as $validazione) {
                switch ($validazione->tipo) {
                    case "CAMPO_OBBLIGATORIO":
                        if (!$this->valida_campo_obbligatorio($valoreInput)) {
                            esci_con_stato(
                                400,
                                "Il campo '$nomeInput' è obbligatorio",
                                $this->redirectSuErrore
                            );
                        }
                        break;

                    case "LUNGHEZZA_MINIMA":
                        if (
                            !$this->valida_lunghezza_minima(
                                $valoreInput,
                                $validazione->lunghezza
                            )
                        ) {
                            esci_con_stato(
                                400,
                                "Il campo '$nomeInput' deve essere lungo almeno $validazione->lunghezza caratteri",
                                $this->redirectSuErrore
                            );
                        }
                        break;

                    case "LUNGHEZZA_MASSIMA":
                        if (
                            !$this->valida_lunghezza_massima(
                                $valoreInput,
                                $validazione->lunghezza
                            )
                        ) {
                            esci_con_stato(
                                400,
                                "Il campo '$nomeInput' non deve superare i $validazione->lunghezza caratteri",
                                $this->redirectSuErrore
                            );
                        }
                        break;

                    case "EMAIL":
                        if (!$this->valida_email($valoreInput)) {
                            esci_con_stato(
                                400,
                                "Il campo '$nomeInput' non ha un formato valido (email)",
                                $this->redirectSuErrore
                            );
                        }
                        break;

                    case "TELEFONO":
                        if (!$this->valida_telefono($valoreInput)) {
                            esci_con_stato(
                                400,
                                "Il campo '$nomeInput' non ha un formato valido (telefono)",
                                $this->redirectSuErrore
                            );
                        }
                        break;

                    case "CF":
                        if (!$this->valida_cf($valoreInput)) {
                            esci_con_stato(
                                400,
                                "Il campo '$nomeInput' non ha un formato valido (codice fiscale)",
                                $this->redirectSuErrore
                            );
                        }
                        break;
                }
            }
        }
    }

    private function valida_campo_obbligatorio($valore)
    {
        if ($valore != null && $valore != "") {
            return true;
        } else {
            return false;
        }
    }

    private function valida_lunghezza_minima($valore, $lunghezza)
    {
        if (strlen($valore) >= $lunghezza) {
            return true;
        } else {
            return false;
        }
    }

    private function valida_lunghezza_massima($valore, $lunghezza)
    {
        if (strlen($valore) <= $lunghezza) {
            return true;
        } else {
            return false;
        }
    }

    private function valida_email($valore)
    {
        if (filter_var($valore, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function valida_telefono($valore)
    {
        if (
            $this->valida_lunghezza_minima($valore, 9) &&
            $this->valida_lunghezza_massima($valore, 11)
        ) {
            return true;
        } else {
            return false;
        }
    }

    private function valida_cf($valore)
    {
        if (
            $this->valida_lunghezza_minima($valore, 16) &&
            $this->valida_lunghezza_massima($valore, 16)
        ) {
            return true;
        } else {
            return false;
        }
    }
}
