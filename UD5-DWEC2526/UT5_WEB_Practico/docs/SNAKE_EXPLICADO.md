# Snake explicado (para principiantes)

Este documento acompaña a `snake.js` y explica qué hace cada parte con palabras sencillas.

## 1. Archivos que usa
- `snake.html`: el HTML con el tablero y los botones.
- `snake.css`: estilos del tablero, la serpiente y la comida.
- `snake.js`: la lógica del juego (este archivo).

## 2. Idea principal del juego
El juego funciona en pasos cortos llamados **ticks**. En cada tick:
1. La serpiente se mueve 1 casilla.
2. Se comprueba si choca.
3. Si come, crece y sube el marcador.
4. Se vuelve a dibujar todo.

## 3. Variables importantes
```js
const GRID_SIZE = 20;
const TICK_MS = 140;
```
- El tablero es de 20x20.
- Cada 140 ms se mueve la serpiente.

```js
let state = null;
```
- `state` es un objeto con toda la información del juego: serpiente, dirección, comida, puntuación, etc.

## 4. Estado inicial
```js
function createInitialState() {
  const startX = Math.floor(GRID_SIZE / 2);
  const startY = Math.floor(GRID_SIZE / 2);

  return {
    snake: [
      { x: startX, y: startY },
      { x: startX - 1, y: startY },
      { x: startX - 2, y: startY },
    ],
    dir: "right",
    nextDir: "right",
    food: null,
    score: 0,
    running: false,
    gameOver: false,
  };
}
```
- La serpiente empieza en el centro con 3 piezas.
- `dir` es la dirección actual.
- `nextDir` es la dirección que se aplicará en el siguiente tick (esto evita giros bruscos).

## 5. Colocar comida
```js
function placeFood(snake) {
  const occupied = new Set(snake.map((part) => `${part.x},${part.y}`));
  const free = [];

  for (let y = 0; y < GRID_SIZE; y += 1) {
    for (let x = 0; x < GRID_SIZE; x += 1) {
      const key = `${x},${y}`;
      if (!occupied.has(key)) {
        free.push({ x, y });
      }
    }
  }

  const pick = Math.floor(Math.random() * free.length);
  return free[pick];
}
```
- Recorremos todas las casillas.
- Quitamos las que ya están ocupadas por la serpiente.
- Elegimos una libre al azar.

## 6. El movimiento (tick)
```js
function step() {
  if (!state.running || state.gameOver) return;

  state.dir = state.nextDir;
  const head = state.snake[0];
  const nextHead = { x: head.x, y: head.y };

  if (state.dir === "up") nextHead.y -= 1;
  if (state.dir === "down") nextHead.y += 1;
  if (state.dir === "left") nextHead.x -= 1;
  if (state.dir === "right") nextHead.x += 1;

  // choque con pared
  if (!isInside(nextHead)) { ... }

  // choque con el propio cuerpo
  const hitSelf = state.snake.some((part) => samePos(part, nextHead));
  if (hitSelf) { ... }

  const ateFood = state.food && samePos(nextHead, state.food);
  state.snake.unshift(nextHead); // ponemos nueva cabeza

  if (ateFood) {
    state.score += 1;
    state.food = placeFood(state.snake);
  } else {
    state.snake.pop(); // quitamos la cola si no come
  }

  render();
}
```
- Si choca con la pared o con su cuerpo, se termina la partida.
- Si come, crece y suma puntos.
- Si no come, se elimina la cola (mantiene tamaño).

## 7. Renderizado en la grid
```js
function render() {
  for (let i = 0; i < cells.length; i += 1) {
    cells[i].className = "cell";
  }

  state.snake.forEach((part, index) => {
    const cell = cells[indexFromPos(part)];
    if (cell) {
      cell.classList.add("snake");
      if (index === 0) cell.classList.add("head");
    }
  });

  if (state.food) {
    const foodCell = cells[indexFromPos(state.food)];
    if (foodCell) foodCell.classList.add("food");
  }
}
```
- Primero limpia el tablero.
- Luego marca las casillas de la serpiente y la comida con clases CSS.

## 8. Controles
```js
document.addEventListener("keydown", handleKey);
startPauseBtn.addEventListener("click", toggleStartPause);
restartBtn.addEventListener("click", restartGame);
```
- Flechas o WASD para moverse.
- Espacio para pausar.
- Botones Start y Restart.

## 9. Consejos para mejorar
1. Mostrar “nivel” y aumentar velocidad según la puntuación.
2. Añadir un sonido simple al comer (opcional).
3. Guardar el mejor score en `localStorage`.
4. Hacer el tablero más grande o más pequeño con un selector.

## 10. Dónde está el código
- `UD5-DWEC2526/UT5_WEB_Practico/snake.js`
