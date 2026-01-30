const { MongoClient } = require("mongodb");
let db;

// Tratará la función de la conexión a la base de datos de Mongo
async function connectDB() {
  if (db) return db; // ya conectado
  const client = new MongoClient(process.env.MONGO_URI);

  await client.connect();
  db = client.db();

  // Mostraremos por la terminal que esta conectado
  console.log("MongoDB Conectado Perfectamente");
  return db;
}

// constante llamando a base de datos

function getDB() {
  if (!db) throw new Error("DB no inicializada. Llama a connectDB() primero.");
  return db;
}
// const getDB = () => db;
module.exports = { connectDB, getDB };
