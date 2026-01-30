const Car = require("../models/Car");

// Leer
exports.getCars = async (req, res) => {
  res.json(await Car.getAll());
};
// Crear
exports.createCar = async (req, res) => {
  const car = new Car ({... req.body, owner: req.user.role });
  await car.create();
  res.status(201).json({ msg: "Coche creado" });
};
// Borrar
exports.deleteCar = async (req, res) => {
  await Car.delete(req.params.id);
  res.json({ msg: "Eliminado" });
};