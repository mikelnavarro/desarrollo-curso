const API_URL = "http://localhost:3200/comments";

const listEl = document.getElementById("list");
const form = document.getElementById("commentForm");
const msgEl = document.getElementById("formMsg");
const reloadBtn = document.getElementById("reload");

async function loadComments() {
  listEl.innerHTML = "<li>Cargando...</li>";
  try {
    const res = await fetch(API_URL);
    const data = await res.json();
    renderList(data);
  } catch (err) {
    listEl.innerHTML = "<li>Error al cargar comentarios</li>";
  }
}

function renderList(data) {
  if (!Array.isArray(data) || data.length === 0) {
    listEl.innerHTML = "<li>No hay comentarios</li>";
    return;
  }

  listEl.innerHTML = "";
  data.forEach((item) => {
    const li = document.createElement("li");
    li.innerHTML = `
      <strong>${item.tema ?? "Sin tema"}</strong>
      <div>${item.comentario ?? ""}</div>
      <div class="meta">${item._id ?? ""}</div>
      <button data-id="${item._id}">Eliminar</button>
    `;
    listEl.appendChild(li);
  });
}

async function createComment(payload) {
  const res = await fetch(API_URL, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });
  return res.json();
}

async function deleteComment(id) {
  const res = await fetch(`${API_URL}/${id}`, { method: "DELETE" });
  return res.json();
}

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  msgEl.textContent = "";

  const tema = document.getElementById("tema").value.trim();
  const comentario = document.getElementById("comentario").value.trim();

  if (!tema || !comentario) {
    msgEl.textContent = "Completa todos los campos.";
    return;
  }

  try {
    await createComment({ tema, comentario });
    form.reset();
    loadComments();
  } catch (err) {
    msgEl.textContent = "No se pudo crear el comentario.";
  }
});

listEl.addEventListener("click", async (e) => {
  const btn = e.target.closest("button[data-id]");
  if (!btn) return;
  try {
    await deleteComment(btn.dataset.id);
    loadComments();
  } catch (err) {
    alert("No se pudo eliminar.");
  }
});

reloadBtn.addEventListener("click", loadComments);

loadComments();
