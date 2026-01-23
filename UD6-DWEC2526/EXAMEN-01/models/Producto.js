class Producto {
  constructor(nombre, descripcion, precio) {
    this.nombre = nombre;
    this.descripcion = descripcion;
    this.precio = precio;
    this.createdAt = new Date();
  }

}
module.exports = Producto;