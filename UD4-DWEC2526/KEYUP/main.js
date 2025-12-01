import { ProductFactory } from "./ProductFactory.js";
import { Storage } from "./Storage.js";
import { DOMFacade } from "./DOMFacade.js";
// VARIBALES INCIALIZADAS
const storage = new Storage();
const formulario = document.getElementById("form-producto");
const arrayProductos = storage.load() || [];

// Evento formulario
formulario.addEventListener("submit", function (e) {
  e.preventDefault();
  const nombre = document.getElementById("nombre").value;
  const precio = document.getElementById("precio").value;
  const categoria = document.getElementById("categoria").value;
  const descuento = parseFloat(document.getElementById("descuento").value);

  let product = ProductFactory.create(nombre,precio,categoria,descuento);
  product.fechaCreacion;
  product.id;
  product.finalPrice;

  arrayProductos.push(product);
  storage.save(arrayProductos);
  storage.load();
  DOMFacade.mostrar(arrayProductos);  
});
DOMFacade.mostrar(arrayProductos);  
