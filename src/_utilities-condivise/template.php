<?php
// Codice che inserisce la struttura fissa del sito web sulle pagine
require_once __DIR__ . "/../api/_utilities/costanti.php";
require_once __DIR__ . "/form.php";

// Classe necessaria a costruire il menu di navigazione e rispettivi link alle pagine
class LinkMenuHeader
{
    public $nome;
    public $url;
    public $profili;

    // Costruisce una voce del menu e il link alla pagina
    public function __construct($nome, $url, $profili)
    {
        $this->nome = $nome;
        $this->url = $url;
        $this->profili = $profili;
    }
}

// Funzione per inserire la head nel documento HTML
function inserisci_head($titolo)
{
    echo "<head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">


       <!-- Bootstrap CSS -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css\" rel=\"stylesheet\"> 

        <!-- Custom Css -->
        <link rel=\"stylesheet\" href=\"/_utilities-condivise/style.css\" />

        <script type=\"module\" src=\"/_utilities-condivise/scripts/errori.js\"></script>
        <script type=\"module\" src=\"script.js\"></script>
        <title>Dentalist - $titolo</title>
    </head>";
}

// Funzione per inserire l'header con il menu di navigazione
function inserisci_header()
{
    $elenco_link_menu = [
        new LinkMenuHeader("Home", "/home/index.php", [
            get_profilo_utente_db(),
            get_profilo_admin_db(),
        ]),
        new LinkMenuHeader("Profilo", "/profilo", [
            get_profilo_utente_db(),
            get_profilo_admin_db(),
        ]),
        new LinkMenuHeader("Le mie visite", "/mie-visite/mievisite.php", [
            get_profilo_utente_db(),
        ]),
        new LinkMenuHeader("Prenota visita", "/prenota-visita", [
            get_profilo_utente_db(),
        ]),
        new LinkMenuHeader("Gestione utenti", "/gestione-utenti", [
            get_profilo_admin_db(),
        ]),
        new LinkMenuHeader("I nostri servizi", "/servizi/servizi.php", [
            get_profilo_utente_db(),
            get_profilo_admin_db(),
        ]),
        new LinkMenuHeader("Chi siamo", "/chi-siamo/chisiamo.php", [
            get_profilo_utente_db(),
            get_profilo_admin_db(),
        ]),
    ];

    $nome_cognome = $_SESSION["nome"] . " " . $_SESSION["cognome"];
    $form_logout =
        "<form action=\"/api/controller/logoutUtente.php\" method=\"GET\" class=\"d-inline\">" .
        "<button type=\"submit\" class=\"btn btn-light\">Logout</button>" .
        "</form>";

    $elenco_link_profilati = "";
    $profilo = $_SESSION["profilo"];

    foreach ($elenco_link_menu as $link_menu) {
        if (in_array($profilo, $link_menu->profili)) {
            $elenco_link_profilati .=
                "<li class=\"nav-item\">" .
                "<a href=\"$link_menu->url\" class=\"nav-link\">" .
                $link_menu->nome .
                "</a>" .
                "</li>";
        }
    }

    echo "<nav class=\"navbar navbar-expand-lg bg-primary\" data-bs-theme=\"dark\">
        <div class=\"container-fluid\">
            <img src=\"/_utilities-condivise/immagini/logoDentalist.svg\" alt=\"Dentalist logo\" class=\"img-fluid\" />
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarColor02\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">
                <span class=\"navbar-text me-auto\">$nome_cognome</span>
                <ul class=\"navbar-nav me-auto\">
                    $elenco_link_profilati
                </ul>
                $form_logout
               
            </div>
        </div>
    </nav>";
}

// Funzione per inserire il footer
function inserisci_footer()
{
    echo "<footer class=\"bg-primary text-white mt-5\">
        <div class=\"container py-4\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <h5>Dentalist</h5>
                    <p class=\"paragrafolato\"> La nostra missione è prenderci cura del vostro sorriso con professionalità e dedizione.</p>
                </div>
                <div class=\"col-md-4\">
                    <h5>Contatti</h5>
                    <ul class=\"list-unstyled\">
                        <li>Email: info@dentalist.it</li>
                        <li>Telefono: +39 012 345 6789</li>
                        <li>Indirizzo: Via Roma 123, 00100 Roma, Italia</li>
                    </ul>
                </div>
                <div class=\"col-md-4\">
                    <h5>Seguici</h5>
                    <ul class=\"list-unstyled\">
                        <li><a href=\"#\" class=\"text-white\">Facebook</a></li>
                        <li><a href=\"#\" class=\"text-white\">Instagram</a></li>
                        <li><a href=\"#\" class=\"text-white\">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class=\"text-center mt-3\">
                <p>&copy; 2025 Dentalist. Tutti i diritti riservati.</p>
            </div>
        </div>
    </footer>";
}
