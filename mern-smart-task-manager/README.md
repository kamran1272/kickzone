# MERN Smart Task Manager

A complete MERN starter with JWT authentication and protected task CRUD.

## Project structure

- `backend/` Express + Mongoose API
- `frontend/` React app (react-scripts) with auth and dashboard UI

## 1) Backend setup

```bash
cd backend
cp .env.example .env
npm install
npm run dev
```

Fill `.env` with your values:

```env
PORT=5000
MONGO_URI=your_mongodb_connection_string
JWT_SECRET=your_jwt_secret
```

## 2) Frontend setup

```bash
cd ../frontend
cp .env.example .env
npm install
npm start
```

Frontend default env:

```env
REACT_APP_API_URL=http://localhost:5000
```

## Available pages

- `/register` create account
- `/login` sign in and store JWT in `localStorage`
- `/` task dashboard with:
  - list tasks
  - add task
  - edit task title
  - mark complete/incomplete
  - delete task

## API routes

- `POST /api/auth/register`
- `POST /api/auth/login`
- `GET /api/tasks` (auth)
- `POST /api/tasks` (auth)
- `PUT /api/tasks/:id` (auth)
- `DELETE /api/tasks/:id` (auth)
