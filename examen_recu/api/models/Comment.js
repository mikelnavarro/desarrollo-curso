const { getDB } = require("../config/db");
const { ObjectId } = require("mongodb");
class Comment {
  constructor(comentario, tema, fechaCreacion) {
    this.comentario = comentario;
    this.tema = tema;
    this.fechaCreacion = Date.now().toLocaleString("ES-es");
  }
  static collection() {
    return getDB().collection("comments");
  }

  static async getAll() {
    return await Comment.collection().tofind().toArray();
  }
  static async create() {
    return await Comment.collection().insertOne({
      comentario: this.comentario,
      tema: this.tema,
      fechaCreacion: this.fechaCreacion,
    });
  }

  static async actualizar(id) {
    const resultado = await database
      .collection("comments")
      .updateOne({ _id: id }, { $set: req.body });
  }
  static async delete(id) {
    return await collection().deleteOne({ _id: new ObjectId(id) });
  }

  static validar(comment) {
    const errores = [];

    if (!comment.tema || comment.tema.trim() === "") {
      errores.push("El título es requerido");
    }
    if (!comment.comentario || comment.comentario.trim() === "") {
      errores.push("El autor es requerido");
    }

    return {
      valido: errores.length === 0,
      errores,
    };
  }
}
module.exports = Comment;
