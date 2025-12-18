// routes/libros.js
const express = require('express');
const router = express.Router();

// Datos simulados (normalmente vendrían de una BD)
let libros = [
  { id: 1, titulo: 'Cien años de soledad', autor: 'Gabriel García Márquez' },
  { id: 2, titulo: 'El Quijote', autor: 'Miguel de Cervantes' },
  { id: 3, titulo: 'Un poeta en Nueva York', autor: 'Federico García Lorca'}
];

// GET: obtener todos los libros
router.get('/', (req, res) => {
  res.json(libros);
});

// GET: obtener un libro por ID
router.get('/:id', (req, res) => {
  const libro = libros.find(l => l.id == req.params.id);
  libro ? res.json(libro) : res.status(404).json({ mensaje: 'Libro no encontrado' });
});
module.exports = router;