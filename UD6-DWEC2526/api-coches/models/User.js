const { getDB } = require("../config/db");

class User {
  constructor({ nombre, email, password, role }) {
    this.nombre = nombre;
    this.email = email;
    this.password = password;
    this.role = role || "user";
  }


  static collection() {
    return getDB().collection("users");
  }
  static async findByEmail(email) {
    return await collection().findOne({ email });
  }
}
module.exports = User;
