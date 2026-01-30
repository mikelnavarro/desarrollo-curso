const Album = require("../models/Album");
const Song = require("../models/Song");



// Leer
exports.getSongs = async (req, res) => {
  res.json(await Song.getAll());
};
// Crear
exports.createSong = async (req, res) => {
  const song = new Song({ ...req.body });
  await song.create();
  res.status(201).json({ msg: "Canción creado" });
};
exports.deleteSong = async (req, res) => {
  await Song.delete(req.params.id);
  res.json({ msg: "Eliminada" });
}
