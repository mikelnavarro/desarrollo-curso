// const bcrypt = require("bcryptjs");
// const jwt = require("jsonwebtoken");
const Comment = require("../models/Comment");

// Crear controlador

exports.createComment = async (req, res) => {
  const validacion = Comment.validar(req.body);
  if (!validacion.valido) {
    return res.status(400).json({
      errores: validacion.errores,
    });
  }

  const comment = new Comment({ ...req.body });
  await comment.create();
  res.status(201).json({ msg: "Comment creado correctamente" });
};

// Borrar
exports.deleteComment = async (req, res) => {
  await Comment.deleteComment(req.params.id);
  res.json({ msg: "Comment eliminado" });
};


// Actualizar
exports.actualizar = async (req, res) => {
  if (resultado.matchedCount === 0) {
    return res.status(404).json({ mensaje: "Libro no encontrado" });
  }
  await Comment.actualizar(req.params.id);
  res.json({ msg: "Comment actualizado" });
};
