# Product Management System API

A production-ready CRUD REST API using Node.js, Express.js, MongoDB, and Mongoose with MVC architecture.

## Quick Start

1. Install dependencies:
   ```bash
   npm install
   ```
2. Create environment file:
   ```bash
   cp .env.example .env
   ```
3. Update `MONGO_URI` in `.env`.
4. Run server:
   ```bash
   npm run dev
   ```

## Endpoints

- `POST /api/products`
- `GET /api/products`
- `GET /api/products/:id`
- `PUT /api/products/:id`
- `DELETE /api/products/:id`

## Health Check

- `GET /api/health`
