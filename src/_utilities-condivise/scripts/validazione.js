export class Validatore {
  _form = null;
  _validazioni = {};

  constructor(idForm) {
    this._form = document.getElementById(idForm);

    if (this._form === null) {
      console.error(`Il form con id "${idForm}" non è stato trovato`);
    }

    fetch(`/_validazioni-form/${idForm}.json`)
      .then((risposta) => {
        return risposta.json();
      })
      .then((validazioniJson) => {
        this._validazioni = validazioniJson;
        this._setupValidazioni();
      })
      .catch(() => {
        console.error(
          `Impossibile recuperare le validazioni per il form "${idForm}"`,
        );
      });
  }

  _setupValidazioni() {
    const inputDelForm = this._form.getElementsByTagName("input");
    const bottoneSubmit = this._form.getElementsByTagName("button")[0];

    bottoneSubmit.addEventListener("click", (event) => {
      let valido = true;
      for (let i = 0; i < inputDelForm.length; i++) {
        const input = inputDelForm[i];
        const validazioniInput = this._validazioni[input.name];

        valido = this._validaInput(input, validazioniInput) && valido;
      }

      if (!valido) {
        event.preventDefault();
      }
    });
  }

  _validaInput(input, validazioni) {
    let valido = true;
    if (validazioni === null || validazioni === undefined) {
      return true;
    }

    for (let i = 0; i < validazioni.length; i++) {
      const validazione = validazioni[i];

      switch (validazione.tipo) {
        case "CAMPO_OBBLIGATORIO":
          valido = this._validaCampoObbligatorio(input);
          break;

        case "LUNGHEZZA_MINIMA":
          valido = this._validaLunghezzaMinima(input, validazione);
          break;

        case "LUNGHEZZA_MASSIMA":
          valido = this._validaLunghezzaMassima(input, validazione);
          break;

        case "TELEFONO":
          valido = this._validaTelefono(input);
          break;

        case "CF":
          valido = this._validaCF(input);
          break;

        case "EMAIL":
          valido = this._validaEmail(input);
          break;
      }

      if (!valido) {
        return false;
      }
    }

    return true;
  }

  _scriviFeedbackValidazioneInput(input, messaggio = null) {
    const labelDiFeedback = input.nextElementSibling;

    if (messaggio === null || messaggio === "") {
      labelDiFeedback.innerText = "";
    } else {
      labelDiFeedback.innerText = messaggio;
    }
  }

  _validaCampoObbligatorio(input) {
    if (
      input.value === undefined ||
      input.value === null ||
      input.value === ""
    ) {
      this._scriviFeedbackValidazioneInput(input, "Il campo è obbligatorio");
      return false;
    } else {
      this._scriviFeedbackValidazioneInput(input);
      return true;
    }
  }

  _validaLunghezzaMinima(input, validazione) {
    if (input.value.length >= validazione.lunghezza) {
      this._scriviFeedbackValidazioneInput(input);
      return true;
    } else {
      this._scriviFeedbackValidazioneInput(
        input,
        `La lunghezza minima è di ${validazione.lunghezza} caratteri`,
      );
      return false;
    }
  }

  _validaLunghezzaMassima(input, validazione) {
    if (input.value.length <= validazione.lunghezza) {
      this._scriviFeedbackValidazioneInput(input);
      return true;
    } else {
      this._scriviFeedbackValidazioneInput(
        input,
        `La lunghezza massima è di ${validazione.lunghezza} caratteri`,
      );
      return false;
    }
  }

  _validaTelefono(input) {
    if (input.value.length >= 9 && input.value.length <= 11) {
      this._scriviFeedbackValidazioneInput(input);
      return true;
    } else {
      this._scriviFeedbackValidazioneInput(
        input,
        `Inserisci un numero di telefono valido`,
      );
      return false;
    }
  }

  _validaCF(input) {
    if (input.value.length >= 16 && input.value.length <= 16) {
      this._scriviFeedbackValidazioneInput(input);
      return true;
    } else {
      this._scriviFeedbackValidazioneInput(
        input,
        `Inserisci un Codice Fiscale valido`,
      );
      return false;
    }
  }

  _validaEmail(input) {
    if (input.validity.valid) {
      this._scriviFeedbackValidazioneInput(input);
      return true;
    } else {
      this._scriviFeedbackValidazioneInput(input, `Inserisci un'email valida`);
      return false;
    }
  }
}
