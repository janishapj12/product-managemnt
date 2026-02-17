const { body, param } = require('express-validator');

const allowedStatus = ['Pending', 'In Progress', 'Completed'];
const allowedPriority = ['Low', 'Medium', 'High'];

const createTaskValidation = [
  body('title')
    .trim()
    .notEmpty()
    .withMessage('Title is required')
    .isLength({ min: 3, max: 150 })
    .withMessage('Title must be between 3 and 150 characters'),
  body('description')
    .optional()
    .trim()
    .isLength({ max: 1000 })
    .withMessage('Description cannot exceed 1000 characters'),
  body('assignedTo')
    .trim()
    .notEmpty()
    .withMessage('Assigned intern name is required')
    .isLength({ min: 2, max: 120 })
    .withMessage('Assigned intern name must be between 2 and 120 characters'),
  body('status')
    .optional()
    .isIn(allowedStatus)
    .withMessage(`Status must be one of: ${allowedStatus.join(', ')}`),
  body('deadline')
    .optional()
    .isISO8601()
    .withMessage('Deadline must be a valid ISO 8601 date'),
  body('priority')
    .optional()
    .isIn(allowedPriority)
    .withMessage(`Priority must be one of: ${allowedPriority.join(', ')}`)
];

const updateTaskValidation = [
  body('title')
    .optional()
    .trim()
    .isLength({ min: 3, max: 150 })
    .withMessage('Title must be between 3 and 150 characters'),
  body('description')
    .optional()
    .trim()
    .isLength({ max: 1000 })
    .withMessage('Description cannot exceed 1000 characters'),
  body('assignedTo')
    .optional()
    .trim()
    .isLength({ min: 2, max: 120 })
    .withMessage('Assigned intern name must be between 2 and 120 characters'),
  body('status')
    .optional()
    .isIn(allowedStatus)
    .withMessage(`Status must be one of: ${allowedStatus.join(', ')}`),
  body('deadline')
    .optional()
    .isISO8601()
    .withMessage('Deadline must be a valid ISO 8601 date'),
  body('priority')
    .optional()
    .isIn(allowedPriority)
    .withMessage(`Priority must be one of: ${allowedPriority.join(', ')}`)
];

const taskIdValidation = [param('id').isMongoId().withMessage('Invalid task ID')];

module.exports = {
  createTaskValidation,
  updateTaskValidation,
  taskIdValidation
};
