require('dotenv').config();
const http = require('http');
const app = require('./app');
const connectDB = require('./config/db');

const PORT = process.env.PORT || 5000;

const startServer = async () => {
  await connectDB();

  const server = http.createServer(app);

  server.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
  });

  process.on('unhandledRejection', (error) => {
    console.error(`Unhandled Rejection: ${error.message}`);
    server.close(() => process.exit(1));
  });

  process.on('uncaughtException', (error) => {
    console.error(`Uncaught Exception: ${error.message}`);
    process.exit(1);
  });
};

startServer();
