// controllers/librosController.js
const { ObjectId } = require("mongodb");
const Producto = require("../models/Producto");
const db = require("../config/db");

class ProductosController {
  // Obtener todos los productos
  static async obtenerTodos(req, res) {
    try {
      const database = db.getDatabase();
      const productos = await database.collection("products").find({}).toArray();
      res.json(productos);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  // Obtener un producto por ID
  static async obtenerPorId(req, res) {
    try {
      const database = db.getDatabase();
      const id = new ObjectId(req.params.id);
      const producto = await database.collection("products").findOne({ _id: id });

      if (!producto) {
        return res.status(404).json({ mensaje: "Producto no encontrado" });
      }
      res.json(producto);
    } catch (error) {
      res.status(400).json({ error: "ID inválido" });
    }
  }
}
