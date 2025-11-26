const input = document.querySelector("input");
const log = document.getElementById("log");

input.addEventListener("keyup", logKey);
function logKey() {
  log.textContent = `${input.value}`;
}