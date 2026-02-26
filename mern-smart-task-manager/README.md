# MERN Smart Task Manager (Scaffold)

This folder contains the script-equivalent scaffold for a MERN task manager with JWT authentication and protected task CRUD endpoints.

## Structure

- `backend/`: Express + MongoDB API with JWT auth and task routes.
- `frontend/`: React-side API service and sample login component.

## Quick start

1. Copy `.env.example` files to `.env` in both backend and frontend.
2. Install backend deps:
   ```bash
   cd backend
   npm install
   npm run dev
   ```
3. Create the React app shell (if needed) and install frontend deps:
   ```bash
   cd ../frontend
   npx create-react-app .
   npm install axios react-router-dom
   npm start
   ```

Then build Dashboard/task pages using `/api/tasks` endpoints.
