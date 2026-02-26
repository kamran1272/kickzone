import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import API from "../services/api";

export default function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const submit = async (e) => {
    e.preventDefault();
    setError("");
    try {
      const { data } = await API.post("/auth/login", { email, password });
      localStorage.setItem("token", data.token);
      navigate("/");
    } catch (err) {
      setError(err.response?.data?.message || "Login failed.");
    }
  };

  return (
    <main className="page-center">
      <form className="card" onSubmit={submit}>
        <h1>Login</h1>
        {error && <p className="error">{error}</p>}
        <input placeholder="Email" onChange={(e) => setEmail(e.target.value)} value={email} />
        <input
          placeholder="Password"
          onChange={(e) => setPassword(e.target.value)}
          type="password"
          value={password}
        />
        <button type="submit">Login</button>
        <p>
          No account? <Link to="/register">Register</Link>
        </p>
      </form>
    </main>
  );
}
