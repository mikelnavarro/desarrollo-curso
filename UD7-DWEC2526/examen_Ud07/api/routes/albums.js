const express = require('express');
const router = express.Router();
const AlbumController = require('../controllers/AlbumController');


router.get('/', AlbumController.getAlbums);
// router.get('/:id', AlbumController.obtenerPorId);
router.post('/', AlbumController.createAlbum);


module.exports = router;
