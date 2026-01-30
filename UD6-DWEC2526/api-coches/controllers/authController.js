const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");

// Usuario de Modelos
const User = require("../models/User");
// Como creamos el login a la Base de datos
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
            role: user.role
        }, process.env.JWT_SECRET,
        // Expirará en 8 h
        { expiresIn: '8h' }
    );
    res.json({ token });

};