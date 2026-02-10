const express = require('express');
const router = express.Router();
const CommentController = require('../controllers/CommentController');



router.get("/", CommentController.getAll);
router.post("/", CommentController.createComment);
router.delete("/:id", CommentController.deleteComment);
router.put('/:id', CommentController.actualizar);
module.exports = router;

