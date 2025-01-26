import { Validatore } from "../_utilities-condivise/scripts/validazione.js";
import { attendiCaricamentoPagina } from "../_utilities-condivise/scripts/eventi.js";

attendiCaricamentoPagina().then(() => {
  new Validatore("form-login");
});
