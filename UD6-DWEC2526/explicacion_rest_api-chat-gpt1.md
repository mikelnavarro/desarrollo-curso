Brutal proyecto — esto ya es **backend profesional real**, no tutorial de juguete. Vamos a montar algo como se hace en entornos serios. 🚀

Stack:
**Node.js + Express + MongoDB (driver nativo) + JWT Auth + Docker + separación por capas**

---

# 🧠 ARQUITECTURA (lo que usan equipos reales)

```
api-coches/
│
├── controllers/      → Lógica (qué se hace)
├── models/           → Acceso a datos (Mongo)
├── routes/           → Endpoints
├── middleware/       → Auth, errores
├── config/           → Conexión DB
├── public/           → Front simple (ver coches)
│
├── app.js            → Config Express
├── server.js         → Arranque
├── package.json
├── Dockerfile
└── docker-compose.yml
```

---

# 🧱 PASO 1 — Crear proyecto

```bash
mkdir api-coches
cd api-coches
npm init -y
```

---

# 📦 PASO 2 — Instalar dependencias

```bash
npm install express mongodb dotenv jsonwebtoken bcryptjs cors
npm install --save-dev nodemon
```

### ¿Qué hace cada una?

| Paquete      | Para qué sirve        |
| ------------ | --------------------- |
| express      | servidor              |
| mongodb      | driver nativo         |
| dotenv       | variables entorno     |
| jsonwebtoken | tokens login          |
| bcryptjs     | encriptar contraseñas |
| cors         | permitir peticiones   |
| nodemon      | reinicio automático   |

---

# 📝 package.json (scripts)

```json
"scripts": {
  "dev": "nodemon server.js",
  "start": "node server.js"
}
```

---

# 🐳 PASO 3 — Docker

### **docker-compose.yml**

```yaml
version: '3.8'

services:
  api:
    build: .
    container_name: api_coches
    ports:
      - "3000:3000"
    volumes:
      - .:/app
    depends_on:
      - mongo
    env_file:
      - .env

  mongo:
    image: mongo:7
    container_name: mongo_db
    ports:
      - "27017:27017"
    volumes:
      - mongo_data:/data/db

volumes:
  mongo_data:
```

---

### **Dockerfile**

```dockerfile
FROM node:20

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .

EXPOSE 3000

CMD ["npm", "run", "dev"]
```

---

# 🔐 PASO 4 — Variables entorno

### `.env`

```
PORT=3000
MONGO_URI=mongodb://mongo:27017/cochesdb
JWT_SECRET=supersecreto
```

---

# 🗄️ PASO 5 — Conexión Mongo

### `config/db.js`

```js
const { MongoClient } = require("mongodb");

let db;

const connectDB = async () => {
  const client = new MongoClient(process.env.MONGO_URI);
  await client.connect();
  db = client.db();
  console.log("MongoDB conectado");
};

const getDB = () => db;

module.exports = { connectDB, getDB };
```

---

# 🚗 PASO 6 — Modelo Coches

### `models/carModel.js`

```js
const { getDB } = require("../config/db");
const { ObjectId } = require("mongodb");

const collection = () => getDB().collection("cars");

exports.getCars = () => collection().find().toArray();

exports.getCarById = (id) =>
  collection().findOne({ _id: new ObjectId(id) });

exports.createCar = (car) =>
  collection().insertOne(car);

exports.deleteCar = (id) =>
  collection().deleteOne({ _id: new ObjectId(id) });
```

---

# 👤 Modelo Usuario (admins)

### `models/userModel.js`

```js
const { getDB } = require("../config/db");

const collection = () => getDB().collection("users");

exports.findUserByEmail = (email) =>
  collection().findOne({ email });

exports.createUser = (user) =>
  collection().insertOne(user);
```

---

# 🎯 PASO 7 — Controllers

### `controllers/carController.js`

```js
const carModel = require("../models/carModel");

exports.getCars = async (req, res) => {
  const cars = await carModel.getCars();
  res.json(cars);
};

exports.createCar = async (req, res) => {
  const car = { ...req.body, owner: req.user.role };
  await carModel.createCar(car);
  res.status(201).json({ msg: "Coche creado" });
};

exports.deleteCar = async (req, res) => {
  await carModel.deleteCar(req.params.id);
  res.json({ msg: "Eliminado" });
};
```

---

### `controllers/authController.js`

```js
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const userModel = require("../models/userModel");

exports.login = async (req, res) => {
  const { email, password } = req.body;
  const user = await userModel.findUserByEmail(email);
  if (!user) return res.status(401).json({ msg: "No existe" });

  const valid = await bcrypt.compare(password, user.password);
  if (!valid) return res.status(401).json({ msg: "Incorrecto" });

  const token = jwt.sign(
    { id: user._id, role: user.role },
    process.env.JWT_SECRET,
    { expiresIn: "8h" }
  );

  res.json({ token });
};
```

---

# 🛡️ Middleware Auth

### `middleware/auth.js`

```js
const jwt = require("jsonwebtoken");

module.exports = (roles = []) => {
  return (req, res, next) => {
    const token = req.headers.authorization?.split(" ")[1];
    if (!token) return res.sendStatus(401);

    try {
      const decoded = jwt.verify(token, process.env.JWT_SECRET);
      if (roles.length && !roles.includes(decoded.role))
        return res.sendStatus(403);

      req.user = decoded;
      next();
    } catch {
      res.sendStatus(401);
    }
  };
};
```

---

# 🛣️ Routes

### `routes/carRoutes.js`

```js
const express = require("express");
const router = express.Router();
const carController = require("../controllers/carController");
const auth = require("../middleware/auth");

router.get("/", carController.getCars);
router.post("/", auth(["admin"]), carController.createCar);
router.delete("/:id", auth(["admin"]), carController.deleteCar);

module.exports = router;
```

---

### `routes/authRoutes.js`

```js
const express = require("express");
const router = express.Router();
const authController = require("../controllers/authController");

router.post("/login", authController.login);

module.exports = router;
```

---

# 🌐 Express App

### `app.js`

```js
const express = require("express");
const cors = require("cors");

const app = express();

app.use(cors());
app.use(express.json());
app.use(express.static("public"));

app.use("/api/cars", require("./routes/carRoutes"));
app.use("/api/auth", require("./routes/authRoutes"));

module.exports = app;
```

---

# 🚀 Server

### `server.js`

```js
require("dotenv").config();
const app = require("./app");
const { connectDB } = require("./config/db");

const PORT = process.env.PORT;

connectDB().then(() => {
  app.listen(PORT, () =>
    console.log(`Servidor en http://localhost:${PORT}`)
  );
});
```

---

# 🖥️ Front simple

### `public/index.html`

```html
<h1>Listado de coches</h1>
<ul id="cars"></ul>

<script>
fetch("/api/cars")
  .then(r => r.json())
  .then(data => {
    const ul = document.getElementById("cars");
    data.forEach(c =>
      ul.innerHTML += `<li>${c.brand} - ${c.model}</li>`
    );
  });
</script>
```

---

# ▶️ ARRANCAR TODO

```bash
docker-compose up --build
```

---

# 🔑 CREAR USUARIO ADMIN (manual Mongo)

Entrar al contenedor:

```bash
docker exec -it mongo_db mongosh
```

```js
use cochesdb
db.users.insertOne({
  email: "admin@test.com",
  password: "$2a$10$9uQK0..." , // generado con bcrypt
  role: "admin"
})
```

---

# 🔐 Flujo real de seguridad

1. Login → recibes TOKEN
2. Lo mandas en headers:

```
Authorization: Bearer TOKEN
```

3. Solo admin puede crear/eliminar coches.

---

Esto es **estructura de backend de empresa**: capas separadas, auth por roles, contenedores, driver nativo.

---

Si quieres, siguiente nivel:
👉 refresh tokens
👉 logs profesionales
👉 paginación real
👉 subida de imágenes de coches
👉 tests automáticos
