// Token y admin normalmente los guardas tras el login:
// localStorage.setItem("token", token);
// localStorage.setItem("admin", admin); // true/false
const token = localStorage.getItem("token");
const isAdmin = localStorage.getItem("admin"); // "true" o "false"
fetch("http://localhost:3000/api/products", {
  method: "GET",
  headers: {
    "x-authentication": token,
    "x-admin": isAdmin,
  },
})
  .then((res) => {
    if (!res.ok) throw new Error("Error al cargar productos: " + res.status);
    return res.json();
  })
  .then((data) => {
    console.log("Productos:", data);
    // TODO ALUMNADO: pintar productos en el DOM
  })
  .catch((err) => {
    console.error(err);
    // TODO ALUMNADO: enviar err.message a POST /log
  });



// Referencias
const IdLibro = document.getElementById("product-id");
const title = document.getElementById("product-name");
const descripcion = document.getElementById("product-desc");
const precio = document.getElementById("product-precio");
const lista = document.getElementById("product-list");
cargarProductos();
function mostrarDom(data) {
  lista.innerHTML = "";

  data.forEach((producto) => {
    // Crear nuevos elementos para cada producto
    const li = document.createElement("article");

    // Crear elementos para el ID, título y descripcion del producto actual
    const IdLibro = document.createElement("span");
    const title = document.createElement("h2");
    const descripcion = document.createElement("span");
    const meta = document.createElement("div");


    IdLibro.textContent = `${producto._id}`;
    title.textContent = `${producto.name}`;
    descripcion.textContent = `Descripcion: ${producto.descripcion}`;
    precio.textContent = `${producto.precio}`;
    
    meta.appendChild(precio);

    title.className = "product-name";
    descripcion.className = "product-desc";
    li.appendChild(title);
    li.appendChild(descripcion);
    li.appendChild(meta);

    // Añadir el li a la lista
    lista.appendChild(li);
  });
}
