const { getDB } = require("../config/db");
const { ObjectId } = require("mongodb");

class Car {
  constructor({ brand, model, year, owner }) {
    this.brand = brand;
    this.model = model;
    this.year = year;
    this.owner = owner;
  }
  // Le estamos diciendo que creemos la colección de la base de datos
  static collection() {
    return getDB().collection("cars");
  }

  static async getAll() {
    return await Car.collection().find().toArray();
  }
  static async create() {
    return await Car.collection().insertOne({
      brand: this.brand,
      model: this.model,
      year: this.year,
      owner: this.owner,
    });
  }
  static async delete(id) {
    return await collection().deleteOne({ _id: new ObjectId(id) });
  }
}
module.exports = Car;
