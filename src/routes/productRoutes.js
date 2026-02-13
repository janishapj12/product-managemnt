const express = require('express');
const {
  createProduct,
  getProducts,
  getProductById,
  updateProduct,
  deleteProduct
} = require('../controllers/productController');
const validateRequest = require('../middleware/validateRequest');
const {
  createProductValidation,
  updateProductValidation,
  productIdValidation
} = require('../middleware/productValidation');

const router = express.Router();

router
  .route('/')
  .post(createProductValidation, validateRequest, createProduct)
  .get(getProducts);

router
  .route('/:id')
  .get(productIdValidation, validateRequest, getProductById)
  .put(productIdValidation, updateProductValidation, validateRequest, updateProduct)
  .delete(productIdValidation, validateRequest, deleteProduct);

module.exports = router;
