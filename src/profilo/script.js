import {
  eseguiGet,
  eseguiDelete,
} from "../_utilities-condivise/scripts/ajax.js";

function getPrenotazioni() {
  eseguiGet("ottieniPrenotazioni")
    .then((response) => response.json()) // Converte la risposta JSON in un oggetto JavaScript
    .then((prenotazioni) => {
      // Qui gestisci i dati ricevuti dal server
      console.log(prenotazioni); // Visualizza l'array di utenti in console
      creaTabella(prenotazioni);
    });
}

function creaHeaderTabella() {
  return (
    "<thead>" +
    "<tr>" +
    "<th>Visita</th>" +
    "<th>Data</th>" +
    "<th>Orario</th>" +
    "<th>Elimina</th>" +
    "</tr>" +
    "</thead>"
  );
}

function creaBodyTabella(prenotazioni) {
  let righe = "";
  prenotazioni.forEach((prenotazione) => {
    righe += `<tr>
          <td>${prenotazione.visita}</td>
          <td>${prenotazione.giorno}</td>
          <td>${prenotazione.orario}</td>
          <td><button data-azione="elimina" data-id="${prenotazione.id}">Elimina</button></td>
        </tr>`;
  });
  return "<tbody>" + righe + "</tbody>";
}

function creaTabella(prenotazioni) {
  const tabella = document.createElement("table");
  tabella.className = "table table-striped table-info";
  tabella.innerHTML = creaHeaderTabella() + creaBodyTabella(prenotazioni);
  tabella.onclick = onClickTabella;
  const container = document.getElementById("container");
  container.innerHTML = " ";
  container.className = "container-tabella-prenotazioni";
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
        const confermaEliminazione = confirm(
          "Sei sicuro di voler eliminare questa prenotazione?",
        );
        if (confermaEliminazione) {
          eseguiDelete("eliminaPrenotazione", [["id", id]]).then(() => {
            getPrenotazioni();
          });
        }
      }
      break;
  }
}

getPrenotazioni();
