// const bcrypt = require("bcryptjs");
// const jwt = require("jsonwebtoken");
const Comment = require("../models/Comment");

// Obtener todos
const getAll = async (req, res) => {
  const comments = await Comment.getAll();
  res.json(comments);
};
// Crear
const createComment = async (req, res) => {
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
const deleteComment = async (req, res) => {
  await Comment.deleteComment(req.params.id);
  res.json({ msg: "Comment eliminado" });
};

// Actualizar
const actualizar = async (req, res) => {
  await Comment.actualizar(req.params.id, req.body);
  res.json({ msg: "Comment actualizado" });
};

module.exports = {
  getAll,
  createComment,
  deleteComment,
  actualizar,
};