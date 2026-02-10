const { MongoClient } = require("mongodb");
// Variables de Entorno
const MONGO_URL =
  process.env.MONGO_URL ||
  "mongodb://mambo:secretoexamen@localhost:27017/comentariodb";
const DB_NAME = process.env.DB_NAME || "comentariodb";
let dbConnection;
module.exports = {
  connectDB: async () => {
    try {
      const client = new MongoClient(MONGO_URL);

      await client.connect();
      dbConnection = client.db(DB_NAME);
      console.log(`Conectado a MongoDB: ${DB_NAME}`);
      return dbConnection;
    } catch (error) {
      console.error("Error conectando a MongoDB:", error);
      throw error;
    }
  },

  getDB: () => {
    if (!dbConnection) {
      throw new Error("Base de datos no inicializada");
    }
    return dbConnection;
  },
};
