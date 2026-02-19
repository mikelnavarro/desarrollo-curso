
export function validarGlobos(maxNumeroGlobos, numeroGlobos) {
  numeroGlobos.setCustomValidity("");
  if (!numeroGlobos.checkValidity()) {
    if (numeroGlobos.validity.rangeOverflow) {
      numeroGlobos.setCustomValidity(
        `El número máximo de globos para hoy es ${maxGlobos}.`,
      );
    }
    numeroGlobos.reportValidity();
  } else {
    localStorage.setItem("numGlobos", numeroGlobos.value);
  }
}