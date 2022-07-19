function confirmDelete() {
  var respuesta = confirm("¿Estas seguro que deseas eliminar la denuncia?");
  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}

function confirmSend() {
    alert("Por restricciones del servidor, no es posible enviar documento via mail. Free Host")
}

function noResults() {
  alert("No hay registros en la busqueda");
}

function wrongAccess() {
    alert("Usuario y/o Contraseña Erroneos\nIntente Nuevamente");
}
