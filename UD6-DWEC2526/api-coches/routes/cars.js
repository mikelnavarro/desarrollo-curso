const express = require('express');
const router = express.Router();
const ctrl = require('../controllers/carController');
const auth = require ('../middleware/auth');


router.get('/', ctrl.getCars);
router.post('/', auth(["admin"]), ctrl.createCar);
router.delete('/:id', auth(["admin"]), ctrl.deleteCar);


module.exports = router;