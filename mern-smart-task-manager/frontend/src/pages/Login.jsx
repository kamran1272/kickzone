import { useState } from "react";
import API from "../../services/api";

export default function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const submit = async () => {
    const { data } = await API.post("/auth/login", { email, password });
    localStorage.setItem("token", data.token);
  };

  return (
    <div>
      <input onChange={(e) => setEmail(e.target.value)} />
      <input onChange={(e) => setPassword(e.target.value)} type="password" />
      <button onClick={submit}>Login</button>
    </div>
  );
}
