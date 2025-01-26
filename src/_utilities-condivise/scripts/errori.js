import { attendiCaricamentoPagina } from "./eventi.js";

function controllaErroriAvvioPagina() {
  const params = new URL(document.location.toString()).searchParams;
  const messaggioErrore = params.get("messaggio_errore");

  if (messaggioErrore) {
    alert(messaggioErrore);
  }
}

attendiCaricamentoPagina().then(() => {
  controllaErroriAvvioPagina();
});
