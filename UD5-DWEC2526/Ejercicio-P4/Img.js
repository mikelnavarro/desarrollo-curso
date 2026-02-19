export class Img {
  constructor(src, alt, x, y, vx, vy) {
    this.alt = alt;
    this.src = src;

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
    // Posicion inicial aleatoria
    this.x = Math.random() * (window.innerWidth - this.img.width);
    this.y = Math.random() * (window.innerHeight - this.img.height);
    // Velocidad
    this.vy = vy;
    this.vx = vx;
  }
  // width/height para mover
  move(container, width, height) {
    // horizontal: -1 o 1
    let direccionX = (Math.random() < 0.5 ? -1 : 1) * this.vx;
    // vertical: -1 o 1
    let direccionY = (Math.random() < 0.5 ? -1 : 1) * this.vy;
    this.x += direccionX;
    this.y += direccionY;
    this.width = width;
    this.height = height;
    // límites
    this.x = Math.max(0, Math.min(this.x, window.innerWidth - this.img.width));
    this.y = Math.max(0, Math.min(this.y, window.innerHeight - this.img.height));
    // Rebote en los bordes
    if (this.x + width > window.innerWidth || this.x < 0) {
      this.vx = -this.vx;
    } else if (this.y + height > window.innerHeight || this.y < 0) {
      this.vy = -this.vy;
    }


    // actualizamos la posicion
    this.img.style.left = this.x + "px";
    this.img.style.top = this.y + "px";

    // Añadimos al container si no está
    if (!this.img.parentElement) {
      container.appendChild(this.img);
    }
  }
}
