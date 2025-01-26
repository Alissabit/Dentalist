export function attendiCaricamentoPagina() {
  const promiseCaricamento = new Promise((resolve) => {
    document.addEventListener("DOMContentLoaded", () => resolve());
  });

  return promiseCaricamento;
}
