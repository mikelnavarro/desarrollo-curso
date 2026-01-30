const Album = require("../models/Album");
// Leer
exports.getAlbums = async (req, res) => {
  res.json(await Album.getAll());
};
// Crear
exports.createAlbum = async (req, res) => {
  const album = new Album({ ...req.body });
  await album.create();
  res.status(201).json({ msg: "Creado" });
};
// Eliminar
exports.deleteAlbum = async (req, res) => {
  await Album.delete(req.params.id);
  res.json({ msg: "Eliminado" });
}
