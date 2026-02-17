const Task = require('../models/taskModel');
const asyncHandler = require('../utils/asyncHandler');

const createTask = asyncHandler(async (req, res) => {
  const task = await Task.create(req.body);

  return res.status(201).json({
    success: true,
    message: 'Task created successfully',
    data: task
  });
});

const getTasks = asyncHandler(async (req, res) => {
  const tasks = await Task.find().sort({ createdAt: -1 });

  return res.status(200).json({
    success: true,
    count: tasks.length,
    data: tasks
  });
});

const getTaskById = asyncHandler(async (req, res, next) => {
  const task = await Task.findById(req.params.id);

  if (!task) {
    const error = new Error('Task not found');
    error.statusCode = 404;
    return next(error);
  }

  return res.status(200).json({
    success: true,
    data: task
  });
});

const updateTask = asyncHandler(async (req, res, next) => {
  const task = await Task.findByIdAndUpdate(req.params.id, req.body, {
    new: true,
    runValidators: true
  });

  if (!task) {
    const error = new Error('Task not found');
    error.statusCode = 404;
    return next(error);
  }

  return res.status(200).json({
    success: true,
    message: 'Task updated successfully',
    data: task
  });
});

const deleteTask = asyncHandler(async (req, res, next) => {
  const task = await Task.findByIdAndDelete(req.params.id);

  if (!task) {
    const error = new Error('Task not found');
    error.statusCode = 404;
    return next(error);
  }

  return res.status(200).json({
    success: true,
    message: 'Task deleted successfully',
    data: task
  });
});

module.exports = {
  createTask,
  getTasks,
  getTaskById,
  updateTask,
  deleteTask
};
