const express = require('express');
const morgan = require('morgan');
const productRoutes = require('./routes/productRoutes');
const notFound = require('./middleware/notFound');
const errorHandler = require('./middleware/errorHandler');

const app = express();

app.use(express.json());
app.use(morgan('dev'));

app.get('/api/health', (req, res) => {
  res.status(200).json({ success: true, message: 'API is running' });
});

app.use('/api/products', productRoutes);

app.use(notFound);
app.use(errorHandler);

module.exports = app;
