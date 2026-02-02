Título: Guía Práctica - API Node.js/Express y Angular para Biblioteca de Libros y Autores

---

# 1. Introducción

Esta guía explica cómo desarrollar una **API REST** con **Node.js/Express** y consumirla desde un **Frontend Angular**. El ejemplo se centra en una **biblioteca de libros y autores**.

Se detalla la estructura de carpetas, modelos, controladores, rutas, servicios y componentes Angular, así como buenas prácticas para organizar el código.

---

# 2. Estructura del Proyecto

```
mi-biblioteca/
├─ api/
│  ├─ models/
│  │  └─ libro.model.js
│  ├─ controllers/
│  │  └─ libro.controller.js
│  ├─ routes/
│  │  └─ libro.routes.js
│  ├─ db.js
│  └─ server.js
└─ web/
   ├─ src/app/services/libro.service.ts
   └─ src/app/components/libro-list/
       ├─ libro-list.component.ts
       └─ libro-list.component.html
```

---

# 3. Backend: Node.js + Express + MongoDB nativo

## 3.1 Conexión a la base de datos

```js
// db.js
const { MongoClient } = require('mongodb');

const url = 'mongodb://localhost:27017';
const dbName = 'biblioteca';
let db;

async function connectDB() {
  const client = new MongoClient(url);
  await client.connect();
  console.log('MongoDB conectado');
  db = client.db(dbName);
  return db;
}

function getDB() {
  if (!db) throw new Error('Database not connected');
  return db;
}

module.exports = { connectDB, getDB };
```

## 3.2 Modelo: acceso a MongoDB

```js
// models/libro.model.js
const { getDB } = require('../db');
const { ObjectId } = require('mongodb');

const collectionName = 'libros';

function findAll() {
  const db = getDB();
  return db.collection(collectionName).find().toArray();
}

function findById(id) {
  const db = getDB();
  return db.collection(collectionName).findOne({ _id: new ObjectId(id) });
}

async function findAllWithAutor() {
  const db = getDB();
  const libros = await db.collection(collectionName).find().toArray();
  const autores = await db.collection('autores').find().toArray();

  return libros.map(libro => {
    const autor = autores.find(a => a._id.toString() === libro.autorId);
    return { ...libro, autorNombre: autor ? autor.nombre : 'Desconocido' };
  });
}

module.exports = { findAll, findById, findAllWithAutor };
```

## 3.3 Controller: preparar JSON

```js
// controllers/libro.controller.js
const LibroModel = require('../models/libro.model');

async function getLibros(req, res) {
  try {
    const libros = await LibroModel.findAllWithAutor();
    res.json(libros);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

async function getLibro(req, res) {
  try {
    const { id } = req.params;
    const libro = await LibroModel.findById(id);
    res.json(libro);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

module.exports = { getLibros, getLibro };
```

## 3.4 Rutas

```js
// routes/libro.routes.js
const express = require('express');
const { getLibros, getLibro } = require('../controllers/libro.controller');

const router = express.Router();

router.get('/', getLibros);
router.get('/:id', getLibro);

module.exports = router;
```

## 3.5 Servidor

```js
// server.js
const express = require('express');
const cors = require('cors');
const { connectDB } = require('./db');
const libroRoutes = require('./routes/libro.routes');

const app = express();

app.use(cors());
app.use(express.json());
app.use('/libros', libroRoutes);

connectDB().then(() => {
  app.listen(3000, () => console.log('API escuchando en http://localhost:3000'));
});
```

---

# 4. Frontend: Angular

## 4.1 Servicio Angular

```ts
// services/libro.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Libro {
  _id: string;
  titulo: string;
  autorId: string;
  autorNombre?: string;
}

@Injectable({ providedIn: 'root' })
export class LibroService {
  private apiUrl = 'http://localhost:3000/libros';

  constructor(private http: HttpClient) {}

  getLibros(): Observable<Libro[]> {
    return this.http.get<Libro[]>(this.apiUrl);
  }

  getLibro(id: string): Observable<Libro> {
    return this.http.get<Libro>(`${this.apiUrl}/${id}`);
  }
}
```

## 4.2 Componente Angular

```ts
// components/libro-list/libro-list.component.ts
import { Component, OnInit } from '@angular/core';
import { LibroService, Libro } from '../../services/libro.service';

@Component({
  selector: 'app-libro-list',
  templateUrl: './libro-list.component.html'
})
export class LibroListComponent implements OnInit {
  libros: Libro[] = [];

  constructor(private libroService: LibroService) {}

  ngOnInit(): void {
    this.libroService.getLibros().subscribe(data => {
      this.libros = data;
    });
  }
}
```

## 4.3 Template HTML

```html
<ul>
  <li *ngFor="let libro of libros">
    {{ libro.titulo }} - Autor: {{ libro.autorNombre }}
  </li>
</ul>
```

## 4.4 Routing Angular

```ts
// app-routing.module.ts
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LibroListComponent } from './components/libro-list/libro-list.component';

const routes: Routes = [
  { path: '', component: LibroListComponent },
  { path: 'libros', component: LibroListComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
```

---

# 5. Flujo de Datos

1. Angular componente `LibroListComponent` solicita datos al servicio `LibroService`.
2. Servicio hace **HTTP GET** a la API (`/libros`).
3. Express router llama al **controller** `getLibros`.
4. Controller llama al **modelo** `findAllWithAutor()` para acceder a MongoDB.
5. Modelo devuelve los documentos.
6. Controller transforma datos si es necesario y devuelve JSON.
7. Angular recibe JSON y lo muestra en el template.

---

# 6. Buenas Prácticas

- Mantener **separación de responsabilidades**: modelos → DB, controllers → JSON, servicios → HTTP.
- Usar **Interfaces TypeScript** para tipar datos en Angular.
- Manejar **errores HTTP** en Angular y Backend.
- Mantener rutas y nombres consistentes.

---

# 7. Conclusión

Con esta estructura, el proyecto es **modular, mantenible y evaluable**. Los estudiantes pueden ampliar funcionalidades, agregar formularios, validaciones y paginación según el nivel de la prueba.

---

**Fin de la Guía**

