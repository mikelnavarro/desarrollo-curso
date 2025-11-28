import { deleteProducto } from "./borradoLocal.js";
import { ProductFactory } from "./ProductFactory.js";

export const DOMFacade = {
  // Mostrar Elementos
  mostrar(arrayProductos) {
    const listaproductos = document.getElementById("listaproductos");
    listaproductos.innerHTML = "";

    // Ver si hay productos
    if (arrayProductos.length === 0) {
      listaproductos.innerHTML = "<p>No hay productos a mostrar.</p>";
      return;
    }
    arrayProductos.forEach((product) => {
      const div = document.createElement("div");
      div.classList.add("producto-card");
      div.innerHTML = `<h5>${product.name}</h5>
            <p>Precio sin IVA: ${product.price} $</p>
            <p>Categoría: ${product.categoria}</p>
            <p>Fecha: ${product.fechaCreacion} </p>
            <p>Precio final: ${product.finalPrice} $ </p>
            <p>Descuento aplicado: ${product.discount}%</p>
            <p>ID: ${product.id}</p><br>
            <button class="delete-btn" data-id="${product.id}">Borrar</button>`;
      listaproductos.appendChild(div);
      const btnDelete = div.querySelector(".delete-btn");
      btnDelete.addEventListener("click", function () {
        const id = btnDelete.dataset.id;
        deleteProducto(id);
      });
    });
  },
  clearForm() {
    document.getElementById("form-producto").reset();
  },
};
