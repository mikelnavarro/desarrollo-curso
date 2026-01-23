const { ObjectId } = require('mongodb');
const Libro = require('../models/Libro');
const db = require('../config/db');

  // Crear un nuevo libro
  static async crear(req, res) {
    try {
      // Validar datos
      const validacion = Libro.validar(req.body);
      if (!validacion.valido) {
        return res.status(400).json({ errores: validacion.errores });
      }

      const nuevoLibro = new Libro(
        req.body.titulo,
        req.body.autor,
        req.body.año,
        req.body.precio
      );

      const database = db.getDatabase();
      const resultado = await database.collection('libros').insertOne(nuevoLibro);

      res.status(201).json({
        mensaje: 'Libro creado exitosamente',
        id: resultado.insertedId,
        libro: nuevoLibro
      });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }