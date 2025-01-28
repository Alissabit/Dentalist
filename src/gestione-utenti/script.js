import {
  eseguiPost,
  eseguiDelete,
  eseguiGet,
} from "../_utilities-condivise/scripts/ajax.js";

function getUtenti() {
  eseguiGet("ottieniUtenti")
    .then((response) => response.json()) // Converte la risposta JSON in un oggetto JavaScript
    .then((utenti) => {
      // Qui gestisci i dati ricevuti dal server
      console.log(utenti); // Visualizza l'array di utenti in console
      creaTabella(utenti);
    });
}

function creaHeaderTabella() {
  return (
    "<thead>" +
    "<tr>" +
    "<th>Nome</th>" +
    "<th>Cognome</th>" +
    "<th>Codice Fiscale</th>" +
    "<th>Modifica</th>" +
    "<th>Elimina</th>" +
    "</tr>" +
    "</thead>"
  );
}

function creaBodyTabella(utenti) {
  let righe = "";
  utenti.forEach((utente) => {
    righe += `<tr>
        <td>${utente.nome}</td>
        <td>${utente.cognome}</td>
        <td>${utente.cf}</td>
        <td><button data-azione="gestisci" data-id="${utente.id}">Gestisci</button></td>
        <td><button data-azione="elimina" data-id="${utente.id}">Elimina</button></td>
      </tr>`;
  });
  return "<tbody>" + righe + "</tbody>";
}

function creaTabella(utenti) {
  const tabella = document.createElement("table");
  tabella.className = "table table-striped table-primary";
  tabella.innerHTML = creaHeaderTabella() + creaBodyTabella(utenti);
  tabella.onclick = onClickTabella;
  const container = document.getElementById("container");
  container.innerHTML = "";
  container.className = "container-tabella-utenti";
  container.appendChild(tabella);
}

function onClickTabella(evento) {
  const elementoCliccato = evento.target;
  if (elementoCliccato.tagName.toLowerCase() != "button") {
    return;
  }
  const azione = elementoCliccato.dataset.azione;
  const id = elementoCliccato.dataset.id;

  switch (azione) {
    case "elimina":
      {
        const confermaUtente = confirm(
          "Sei sicuro di voler eliminare questo utente?",
        );
        if (confermaUtente) {
          eseguiDelete("eliminaUtente", [["id", id]]).then(() => {
            getUtenti();
          });
        }
      }
      break;

    case "gestisci":
      {
        eseguiPost("preparaInfoUtente", [["id", id]]);
      }
      break;
  }
}

getUtenti();
