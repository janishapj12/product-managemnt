const express = require('express');
const {
  createTask,
  getTasks,
  getTaskById,
  updateTask,
  deleteTask
} = require('../controllers/taskController');
const validateRequest = require('../middleware/validateRequest');
const {
  createTaskValidation,
  updateTaskValidation,
  taskIdValidation
} = require('../middleware/taskValidation');

const router = express.Router();

router.route('/').post(createTaskValidation, validateRequest, createTask).get(getTasks);

router
  .route('/:id')
  .get(taskIdValidation, validateRequest, getTaskById)
  .put(taskIdValidation, updateTaskValidation, validateRequest, updateTask)
  .delete(taskIdValidation, validateRequest, deleteTask);

module.exports = router;
