const Product = require('../models/productModel');
const asyncHandler = require('../utils/asyncHandler');

const createProduct = asyncHandler(async (req, res) => {
  const { name, price, description, stock } = req.body;

  const product = await Product.create({
    name,
    price,
    description,
    stock
  });

  return res.status(201).json({
    success: true,
    message: 'Product created successfully',
    data: product
  });
});

const getProducts = asyncHandler(async (req, res) => {
  const products = await Product.find().sort({ createdAt: -1 });

  return res.status(200).json({
    success: true,
    count: products.length,
    data: products
  });
});

const getProductById = asyncHandler(async (req, res, next) => {
  const product = await Product.findById(req.params.id);

  if (!product) {
    const error = new Error('Product not found');
    error.statusCode = 404;
    return next(error);
  }

  return res.status(200).json({
    success: true,
    data: product
  });
});

const updateProduct = asyncHandler(async (req, res, next) => {
  const updates = req.body;

  const product = await Product.findByIdAndUpdate(req.params.id, updates, {
    new: true,
    runValidators: true
  });

  if (!product) {
    const error = new Error('Product not found');
    error.statusCode = 404;
    return next(error);
  }

  return res.status(200).json({
    success: true,
    message: 'Product updated successfully',
    data: product
  });
});

const deleteProduct = asyncHandler(async (req, res, next) => {
  const product = await Product.findByIdAndDelete(req.params.id);

  if (!product) {
    const error = new Error('Product not found');
    error.statusCode = 404;
    return next(error);
  }

  return res.status(200).json({
    success: true,
    message: 'Product deleted successfully',
    data: product
  });
});

module.exports = {
  createProduct,
  getProducts,
  getProductById,
  updateProduct,
  deleteProduct
};
