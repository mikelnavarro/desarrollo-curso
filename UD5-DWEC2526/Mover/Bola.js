// --- FUNCIÓN PARA CREAR BOLAS ---
export class Bola {
  constructor(x, y, dx, dy, radio, color) {
    this.x = x; // posición horizontal
    this.y = y; // posición vertical
    this.dx = dx; // velocidad horizontal
    this.dy = dy; // velocidad vertical
    this.radio = radio;
    this.color = color;
  }

  // Dibuja la bola en un contexto de canvas
  dibujar(ctx) {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radio, 0, Math.PI * 2);
    ctx.fillStyle = this.color;
    ctx.fill();
    ctx.closePath();
  }

  // Actualiza posición y rebota en los bordes
  mover(ctx, width, height) {
    this.x += this.dx;
    this.y += this.dy;

    if (this.x + this.radio > width || this.x - this.radio < 0)
      this.dx = -this.dx;
    if (this.y + this.radio > height || this.y - this.radio < 0)
      this.dy = -this.dy;

    this.dibujar(ctx);
  }
}
