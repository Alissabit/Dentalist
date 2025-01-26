function percorsoController(nomeController) {
  return `/api/controller/${nomeController}.php`;
}

export function eseguiDelete(nomeController, parametri = []) {
  const queryString = new URLSearchParams(parametri).toString();
  return fetch(`${percorsoController(nomeController)}?${queryString}`, {
    method: "DELETE",
  });
}

export function eseguiGet(nomeController, parametri = []) {
  const queryString = new URLSearchParams(parametri).toString();
  return fetch(`${percorsoController(nomeController)}?${queryString}`);
}

export function eseguiPost(nomeController, parametri = []) {
  const queryString = new URLSearchParams(parametri).toString();
  return fetch(`${percorsoController(nomeController)}?${queryString}`, {
    method: "POST",
  });
}
