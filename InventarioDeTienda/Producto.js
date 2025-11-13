import {
  tipoGeneral,
  tipoNulo,
  tipoSuperReducido,
  tipoReducido,
} from "./constantes.js";
export class Producto {
  nombre;
  precioBase;
  categoria;
  precioConIVA;
  codigo;
  fechaCreacion;
  constructor(nombre, precioBase, categoria) {
    this.nombre = nombre;
    this.precioBase = precioBase;
    this.categoria = categoria;
    this.fechaCreacion = new Date();
  }


  generarCodigoProducto(){
    let id = 0;
    id++;
    const mes = this.fechaCreacion.getMonth() + 1;
    const pLetra = this.nombre.slice(0,1);
    const pCategoria = this.categoria.slice(0,1);
    
    let identificador = id.toString();
    // Si la longitud es menor que 3, añade ceros delante.
    while (identificador.length < 3) {
        identificador = "0" + identificador;
    }
    return `${pCategoria}${mes}${pLetra}`;
  }
  formatearFechaCreacion() {
    const dia = this.fechaCreacion.getDate();
    const mes = this.fechaCreacion.getMonth() + 1;
    const year = this.fechaCreacion.getFullYear();
    let fechaEspañola = `${dia}/${mes}/${year}`;
    return this.fechaCreacion.toLocaleString("es-ES", {
      day: "2-digit",
      month: "long",
      year: "numeric",
      hour: "2-digit",
      minute: "2-digit",
    });
  }
  calcularPrecioIVA() {
    if (this.categoria === "Higiene") {
      this.precioConIVA = this.precioBase * (tipoSuperReducido);
    } else if (this.categoria === "Alimentacion") {
      this.precioConIVA = this.precioBase * (tipoSuperReducido);
    } else {
      this.precioConIVA = this.precioBase * (tipoGeneral);
    }

    return this.precioConIVA;
  }
}