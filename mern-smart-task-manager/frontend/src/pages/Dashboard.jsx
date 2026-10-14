import { useEffect, useMemo, useState } from "react";
import { useNavigate } from "react-router-dom";
import API from "../services/api";

export default function Dashboard() {
  const [tasks, setTasks] = useState([]);
  const [title, setTitle] = useState("");
  const [editingId, setEditingId] = useState(null);
  const [editingTitle, setEditingTitle] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const completedCount = useMemo(() => tasks.filter((task) => task.completed).length, [tasks]);

  const loadTasks = async () => {
    try {
      const { data } = await API.get("/tasks");
      setTasks(data);
    } catch (err) {
      setError(err.response?.data?.message || "Failed to load tasks.");
    }
  };

  useEffect(() => {
    loadTasks();
  }, []);

  const addTask = async (e) => {
    e.preventDefault();
    if (!title.trim()) return;

    try {
      const { data } = await API.post("/tasks", { title });
      setTasks((prev) => [data, ...prev]);
      setTitle("");
    } catch (err) {
      setError(err.response?.data?.message || "Failed to add task.");
    }
  };

  const toggleTask = async (task) => {
    try {
      const { data } = await API.put(`/tasks/${task._id}`, { completed: !task.completed });
      setTasks((prev) => prev.map((item) => (item._id === task._id ? data : item)));
    } catch (err) {
      setError(err.response?.data?.message || "Failed to update task.");
    }
  };

  const saveEdit = async (taskId) => {
    try {
      const { data } = await API.put(`/tasks/${taskId}`, { title: editingTitle });
      setTasks((prev) => prev.map((item) => (item._id === taskId ? data : item)));
      setEditingId(null);
      setEditingTitle("");
    } catch (err) {
      setError(err.response?.data?.message || "Failed to save task.");
    }
  };

  const removeTask = async (taskId) => {
    try {
      await API.delete(`/tasks/${taskId}`);
      setTasks((prev) => prev.filter((item) => item._id !== taskId));
    } catch (err) {
      setError(err.response?.data?.message || "Failed to delete task.");
    }
  };

  const logout = () => {
    localStorage.removeItem("token");
    navigate("/login");
  };

  return (
    <main className="dashboard page-center">
      <section className="card">
        <header className="row between">
          <h1>Task Dashboard</h1>
          <button onClick={logout}>Logout</button>
        </header>

        {error && <p className="error">{error}</p>}

        <form className="row" onSubmit={addTask}>
          <input
            placeholder="Add new task"
            value={title}
            onChange={(e) => setTitle(e.target.value)}
          />
          <button type="submit">Add</button>
        </form>

        <p className="muted">
          Completed {completedCount} / {tasks.length}
        </p>

        <ul className="task-list">
          {tasks.map((task) => (
            <li key={task._id} className="task-item row between">
              {editingId === task._id ? (
                <input
                  value={editingTitle}
                  onChange={(e) => setEditingTitle(e.target.value)}
                  onBlur={() => saveEdit(task._id)}
                  onKeyDown={(e) => {
                    if (e.key === "Enter") {
                      e.preventDefault();
                      saveEdit(task._id);
                    }
                  }}
                  autoFocus
                />
              ) : (
                <label className="row">
                  <input
                    type="checkbox"
                    checked={task.completed}
                    onChange={() => toggleTask(task)}
                  />
                  <span className={task.completed ? "done" : ""}>{task.title}</span>
                </label>
              )}

              <div className="row gap-sm">
                <button
                  onClick={() => {
                    setEditingId(task._id);
                    setEditingTitle(task.title);
                  }}
                >
                  Edit
                </button>
                <button className="danger" onClick={() => removeTask(task._id)}>
                  Delete
                </button>
              </div>
            </li>
          ))}
        </ul>
      </section>
    </main>
  );
}
