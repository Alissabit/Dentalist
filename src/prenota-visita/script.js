export function showLoader() {
  document.getElementById("loader").style.display = "block";
  document.getElementById("loader-background").style.display = "block";
}

// Funzione per nascondere il loader
export function hideLoader() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("loader-background").style.display = "none";
}

const form = document.getElementById("form-prenotazione");
form.addEventListener("submit", function (event) {
  event.preventDefault(); // Previeni l'invio immediato del form

  showLoader(); // Mostra il loader

  // Aspetta 3 secondi prima di inviare il form
  setTimeout(function () {
    hideLoader(); // Nascondi il loader
    form.submit(); // Esegui l'invio del form
  }, 3000); // 3000 ms = 3 secondi
});
