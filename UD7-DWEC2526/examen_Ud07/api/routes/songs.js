const express = require('express');
const router = express.Router();

// Controlador
const SongController = require('../controllers/SongController');
// Rutas
router.get('/', SongController.getSongs);
// router.get('/:id', SongController.obtenerPorId);
router.post('/', SongController.createSong);

router.delete('/', SongController.deleteSong);


module.exports = router;