const express = require("express");
const Task = require("../models/Task");
const auth = require("../middleware/authMiddleware");

const router = express.Router();

router.get("/", auth, async (req, res) => {
  try {
    const tasks = await Task.find({ user: req.user.id }).sort({ createdAt: -1 });
    return res.json(tasks);
  } catch (error) {
    return res.status(500).json({ message: "Unable to fetch tasks.", error: error.message });
  }
});

router.post("/", auth, async (req, res) => {
  try {
    const { title } = req.body;
    if (!title?.trim()) {
      return res.status(400).json({ message: "Task title is required." });
    }

    const task = await Task.create({
      title: title.trim(),
      completed: Boolean(req.body.completed),
      user: req.user.id,
    });

    return res.status(201).json(task);
  } catch (error) {
    return res.status(500).json({ message: "Unable to create task.", error: error.message });
  }
});

router.put("/:id", auth, async (req, res) => {
  try {
    const task = await Task.findOneAndUpdate(
      { _id: req.params.id, user: req.user.id },
      req.body,
      { new: true, runValidators: true },
    );

    if (!task) {
      return res.status(404).json({ message: "Task not found." });
    }

    return res.json(task);
  } catch (error) {
    return res.status(500).json({ message: "Unable to update task.", error: error.message });
  }
});

router.delete("/:id", auth, async (req, res) => {
  try {
    const task = await Task.findOneAndDelete({ _id: req.params.id, user: req.user.id });
    if (!task) {
      return res.status(404).json({ message: "Task not found." });
    }

    return res.json({ deleted: true });
  } catch (error) {
    return res.status(500).json({ message: "Unable to delete task.", error: error.message });
  }
});

module.exports = router;
