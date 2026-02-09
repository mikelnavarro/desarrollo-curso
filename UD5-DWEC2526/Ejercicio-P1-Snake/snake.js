// Snake clasico para estudiantes: logica simple + render en una grid.
// Funciona con snake.html y snake.css.
// Objetivo: que sea facil de leer y de modificar.

const GRID_SIZE = 20;
const TICK_MS = 140;

// Elementos del DOM (HTML)
const board = document.getElementById("board");
const scoreEl = document.getElementById("score");
const statusEl = document.getElementById("status");
const startPauseBtn = document.getElementById("startPause");
const restartBtn = document.getElementById("restart");
const mobilePad = document.querySelector(".mobile-pad");

// Estado del juego en memoria
const cells = [];
let state = null;
let timerId = null;

// Crea la grid de 20x20 en el HTML
function createBoard() {
  board.innerHTML = "";
  cells.length = 0;

  for (let i = 0; i < GRID_SIZE * GRID_SIZE; i += 1) {
    const cell = document.createElement("div");
    cell.className = "cell";
    cells.push(cell);
    board.appendChild(cell);
  }
}

// Convierte {x,y} en indice de 0..399
function indexFromPos(pos) {
  return pos.y * GRID_SIZE + pos.x;
}

// Compara dos posiciones
function samePos(a, b) {
  return a.x === b.x && a.y === b.y;
}

// Comprueba si una posicion esta dentro del tablero
function isInside(pos) {
  return pos.x >= 0 && pos.x < GRID_SIZE && pos.y >= 0 && pos.y < GRID_SIZE;
}

// Coloca la comida en un hueco libre
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

  if (free.length === 0) {
    return null;
  }

  const pick = Math.floor(Math.random() * free.length);
  return free[pick];
}

// Estado inicial al reiniciar
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

// Actualiza el texto de estado
function setStatus(text) {
  statusEl.textContent = text;
}

// Actualiza el marcador
function updateScore() {
  scoreEl.textContent = String(state.score);
}

// Dibuja tablero, serpiente y comida
function render() {
  for (let i = 0; i < cells.length; i += 1) {
    cells[i].className = "cell";
  }

  state.snake.forEach((part, index) => {
    const cell = cells[indexFromPos(part)];
    if (cell) {
      cell.classList.add("snake");
      if (index === 0) {
        cell.classList.add("head");
      }
    }
  });

  if (state.food) {
    const foodCell = cells[indexFromPos(state.food)];
    if (foodCell) {
      foodCell.classList.add("food");
    }
  }
}

// Un "tick" del juego: mover, comer, chocar, etc.
function step() {
  if (!state.running || state.gameOver) {
    return;
  }

  state.dir = state.nextDir;

  const head = state.snake[0];
  const nextHead = { x: head.x, y: head.y };

  if (state.dir === "up") nextHead.y -= 1;
  if (state.dir === "down") nextHead.y += 1;
  if (state.dir === "left") nextHead.x -= 1;
  if (state.dir === "right") nextHead.x += 1;

  if (!isInside(nextHead)) {
    state.gameOver = true;
    state.running = false;
    setStatus("Game Over");
    startPauseBtn.textContent = "Start";
    return;
  }

  const hitSelf = state.snake.some((part) => samePos(part, nextHead));
  if (hitSelf) {
    state.gameOver = true;
    state.running = false;
    setStatus("Game Over");
    startPauseBtn.textContent = "Start";
    return;
  }

  const ateFood = state.food && samePos(nextHead, state.food);
  state.snake.unshift(nextHead);

  if (ateFood) {
    state.score += 1;
    state.food = placeFood(state.snake);
    updateScore();
    if (!state.food) {
      setStatus("You Win!");
      state.running = false;
    }
  } else {
    state.snake.pop();
  }

  render();
}

// Inicia o reanuda el juego
function startGame() {
  if (state.gameOver) {
    return;
  }
  if (!state.food) {
    state.food = placeFood(state.snake);
  }
  state.running = true;
  setStatus("Playing");
  startPauseBtn.textContent = "Pause";
}

// Pausa el juego
function pauseGame() {
  state.running = false;
  setStatus("Paused");
  startPauseBtn.textContent = "Start";
}

// Alterna Start/Pause
function toggleStartPause() {
  if (state.running) {
    pauseGame();
  } else {
    startGame();
  }
}

// Reinicia estado y vuelve a dibujar
function restartGame() {
  state = createInitialState();
  state.food = placeFood(state.snake);
  updateScore();
  setStatus("Ready");
  startPauseBtn.textContent = "Start";
  render();
}

// Cambia direccion evitando giro de 180 grados
function setDirection(dir) {
  if (state.snake.length > 1) {
    if (state.dir === "up" && dir === "down") return;
    if (state.dir === "down" && dir === "up") return;
    if (state.dir === "left" && dir === "right") return;
    if (state.dir === "right" && dir === "left") return;
  }
  state.nextDir = dir;
}

// Teclas: flechas o WASD, espacio para pausa
function handleKey(e) {
  if (e.key === "ArrowUp" || e.key === "w" || e.key === "W") {
    setDirection("up");
  }
  if (e.key === "ArrowDown" || e.key === "s" || e.key === "S") {
    setDirection("down");
  }
  if (e.key === "ArrowLeft" || e.key === "a" || e.key === "A") {
    setDirection("left");
  }
  if (e.key === "ArrowRight" || e.key === "d" || e.key === "D") {
    setDirection("right");
  }
  if (e.key === " ") {
    toggleStartPause();
  }
}

// Botones mobile (arriba/abajo/izquierda/derecha)
function handleMobileClick(e) {
  const btn = e.target.closest("button[data-dir]");
  if (!btn) return;
  setDirection(btn.dataset.dir);
}

// Arranque: crea tablero, eventos y el timer
function init() {
  createBoard();
  restartGame();
  document.addEventListener("keydown", handleKey);
  startPauseBtn.addEventListener("click", toggleStartPause);
  restartBtn.addEventListener("click", restartGame);
  if (mobilePad) {
    mobilePad.addEventListener("click", handleMobileClick);
  }
  timerId = setInterval(step, TICK_MS);
}

init();
