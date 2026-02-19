export class Img {
  constructor(src, alt, x, y) {
    this.alt = alt;
    this.src = src;
    // Posicion inicial aleatoria
    this.x = Math.random() * (window.innerWidth - 50);
    this.y = Math.random() * (window.innerHeight - 50);
    // Velocidad Y/X (antes estaba aqui)
    // Creamos el elemento img
    this.img = document.createElement("img");
    this.img.src = src;
    this.img.alt = alt;
    this.img.style.position = "absolute";
    this.img.style.width = "60px";
    this.img.style.height = "60px";
    // Para no SOBREPONERSE
    this.img.style.top =
      Math.random() * (window.innerHeight - this.img.height) + "px";
    this.img.style.left =
      Math.random() * (window.innerWidth - this.img.width) + "px";

  }

  move(container, width, height) {

    // Dirección
    let direccionX = (Math.random() < 0.5 ? -1 : 1); // horizontal: -1 o 1
    let direccionY = (Math.random() < 0.5 ? -1 : 1); // vertical: -1 o 1
    // Longitud Aleatoria
    let distanciaX = Math.floor(Math.random() * 41) + 10;
    let distanciaY = Math.floor(Math.random() * 41) + 10;


    this.x += direccionX * distanciaX;
    this.y += direccionY * distanciaY;
    // width/height
    this.width = width;
    this.height = height;
    // Control de los Bordes
    this.x = Math.max(0, Math.min(this.x, window.innerWidth - width));
    this.y = Math.max(0, Math.min(this.y, window.innerHeight - height));
    // actualizamos la posicion 
    this.img.style.left = this.x + "px";
    this.img.style.top = this.y + "px";


    // Añadimos al container si no está
    if (!this.img.parentElement) {
      container.appendChild(this.img);
    }
  }
}
