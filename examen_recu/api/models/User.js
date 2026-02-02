const { getDB } = require("../config/db");
const { ObjectId } = require("mongodb");
class User {
  constructor(name, email, password) {
    this.name = name;
    this.email = email;
    this.password = password;
  }

  // Le estamos diciendo que creemos la colección de la base de datos
  static collection() {
    return getDB().collection("users");
  }

  
  // Buscamos Email
  static async findByEmail(email) {
    return await collection().findOne({ email });
  }
  // Cuando buscamos por el correo o otro campo
  static async comprobar(name, password) {
    return await collection().findOne({ name, password });
  }
  static async getAll() {
    return await User.collection().find().toArray();
  }
  static async registro() {
    return await User.collection().insertOne({
      name: this.name,
      email: this.email,
      password: this.password,
    });
  }
}
module.exports = User;