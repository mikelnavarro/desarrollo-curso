// routes/productos.js
const express = require("express");
const router = express.Router();
const db = require("../config/db"); // Importa el módulo db.js
const { ObjectId } = require("mongodb");
const ProductosController = require('../controllers/productController');

// Rutas CRUD
router.get('/', ProductosController.obtenerTodos);
router.get('/:id', ProductosController.obtenerPorId);
router.post('/', ProductosController.crear);
router.put('/:id', ProductosController.actualizar);
// Obtén la colección de productos
const getProductosCollection = () => {
  const dbConnection = db.getDatabase();
  return dbConnection.collection("products");
};
// Obtener todos los productos (GET /api/products)
router.get("/", async (req, res) => {
  try {
    const productosCollection = getProductosCollection();
    const productos = await productosCollection.find().toArray();
    res.json(productos);
  } catch (error) {
    console.error("Error al obtener productos:", error);
    res.status(500).json({ error: "Error al obtener productos" });
  }
});
// Añadir un producto (POST /api/products)
router.post("/", async (req, res) => {
  try {
    const productosCollection = getProductosCollection();
    const nuevoProducto = req.body;
    const result = await productosCollection.insertOne(nuevoProducto);
    res.status(201).json(result);
  } catch (error) {
    console.error("Error al añadir producto:", error);
    res.status(500).json({ error: "Error al añadir producto" });
  }
});

// Eliminar un producto (DELETE /api/products/:id)
router.delete("/:id", async (req, res) => {
  try {
    const productosCollection = getProductosCollection();
    const id = req.params.id;
    const result = await productosCollection.deleteOne({
      _id: new ObjectId(id),
    });
    res.json(result);
  } catch (error) {
    console.error("Error al eliminar producto:", error);
    res.status(500).json({ error: "Error al eliminar producto" });
  }
});
module.exports = router;
