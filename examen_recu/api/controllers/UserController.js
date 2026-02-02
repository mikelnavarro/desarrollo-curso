// const bcrypt = require("bcryptjs");
// const jwt = require("jsonwebtoken");
const User = require("../models/User");




// Leer

// Crear login
exports.login = async (req, res) => {
    const user = await User.findByEmail(req.body.email);
    if (!user) {
        return res.sendStatus(401); // Código 401
    }
    const ok = await bcrypt.compare(req.body.password, user.password);
    if (!ok) {
        return res.sendStatus(401); // Código 401
    }
    const token = jwt.sign(
        {id: user._id,
          name: user.name,
        }, process.env.JWT_SECRET,
        // Expirará en 8 h
        { expiresIn: '8h' }
    );
    res.json({ token });
  };
// Crear
exports.createUser = async (req, res) => {
  const user = new User({ ...req.body });
  await user.create();
  res.status(201).json({ msg: "Usuario registrado" });
};
exports.deleteUser = async (req, res) => {
  await User.delete(req.params.id);
  res.json({ msg: "Usuario eliminado" });
}
