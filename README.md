# Intern Task Management System API

Production-ready backend CRUD API for managing intern tasks, built with **Node.js**, **Express.js**, and **MongoDB (Mongoose)** using an **MVC architecture**.

## Tech Stack

- Node.js
- Express.js
- MongoDB + Mongoose
- express-validator
- dotenv
- Centralized error handling middleware

## Project Folder Structure

```bash
Intern-Management-System/
├── src/
│   ├── config/
│   │   └── db.js
│   ├── controllers/
│   │   └── taskController.js
│   ├── middleware/
│   │   ├── errorHandler.js
│   │   ├── notFound.js
│   │   ├── taskValidation.js
│   │   └── validateRequest.js
│   ├── models/
│   │   └── taskModel.js
│   ├── routes/
│   │   └── taskRoutes.js
│   ├── utils/
│   │   └── asyncHandler.js
│   ├── app.js
│   └── server.js
├── .env.example
├── package.json
└── README.md
```

## Setup Instructions

1. Install dependencies:
   ```bash
   npm install
   ```
2. Copy environment template:
   ```bash
   cp .env.example .env
   ```
3. Update `.env` with a valid MongoDB URI.
4. Run in development:
   ```bash
   npm run dev
   ```
5. Run in production:
   ```bash
   npm start
   ```

## Sample `.env`

```env
NODE_ENV=development
PORT=5000
MONGO_URI=mongodb://127.0.0.1:27017/intern_task_management
```

## Data Model: Task

Each task contains:

- `title` (required, string)
- `description` (optional, string)
- `assignedTo` (required, string)
- `status` (`Pending`, `In Progress`, `Completed`)
- `deadline` (Date)
- `priority` (`Low`, `Medium`, `High`)
- `createdAt` and `updatedAt` timestamps

## API Endpoint List

Base URL: `http://localhost:5000/api/tasks`

- `POST /api/tasks` → Create a new intern task
- `GET /api/tasks` → Get all tasks
- `GET /api/tasks/:id` → Get single task by ID
- `PUT /api/tasks/:id` → Update task by ID
- `DELETE /api/tasks/:id` → Delete task by ID
- `GET /api/health` → Health check

## Sample Requests & Responses

### 1) Create Task

**Request**

```http
POST /api/tasks
Content-Type: application/json
```

```json
{
  "title": "Prepare onboarding checklist",
  "description": "Create and verify onboarding tasks for new interns",
  "assignedTo": "Aisha Khan",
  "status": "Pending",
  "deadline": "2026-07-25T12:00:00.000Z",
  "priority": "High"
}
```

**Response (201 Created)**

```json
{
  "success": true,
  "message": "Task created successfully",
  "data": {
    "_id": "66bc0ca39f8c6f41cc4f88fd",
    "title": "Prepare onboarding checklist",
    "description": "Create and verify onboarding tasks for new interns",
    "assignedTo": "Aisha Khan",
    "status": "Pending",
    "deadline": "2026-07-25T12:00:00.000Z",
    "priority": "High",
    "createdAt": "2026-07-20T09:15:10.102Z",
    "updatedAt": "2026-07-20T09:15:10.102Z"
  }
}
```

### 2) Validation Failure Example

**Response (400 Bad Request)**

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": [
    {
      "msg": "Title is required",
      "field": "title",
      "value": ""
    }
  ]
}
```

### 3) Get All Tasks

**Response (200 OK)**

```json
{
  "success": true,
  "count": 1,
  "data": [
    {
      "_id": "66bc0ca39f8c6f41cc4f88fd",
      "title": "Prepare onboarding checklist",
      "description": "Create and verify onboarding tasks for new interns",
      "assignedTo": "Aisha Khan",
      "status": "Pending",
      "deadline": "2026-07-25T12:00:00.000Z",
      "priority": "High",
      "createdAt": "2026-07-20T09:15:10.102Z",
      "updatedAt": "2026-07-20T09:15:10.102Z"
    }
  ]
}
```

### 4) Not Found Example

**Response (404 Not Found)**

```json
{
  "success": false,
  "message": "Task not found"
}
```

## Architecture Decisions

- **MVC separation**:
  - **Model** manages schema constraints and persistence.
  - **Controller** contains business logic and status-code handling.
  - **Routes** map REST endpoints to controller actions.
- **Validation at route layer** using `express-validator` ensures invalid payloads are rejected early.
- **Reusable `validateRequest` middleware** centralizes validation response formatting.
- **Async error management** uses `asyncHandler` to avoid repetitive try/catch in each route handler while preserving centralized error flow.
- **Centralized error handling** via `errorHandler` middleware produces consistent, meaningful API errors.
- **Scalability**:
  - Features are modular by domain (`tasks`) and can be extended with additional modules (e.g., interns, comments, auth) without changing core structure.

## HTTP Status Codes Used

- `201` Created
- `200` OK
- `400` Bad Request
- `404` Not Found
- `409` Conflict (duplicate key handling)
- `500` Internal Server Error
