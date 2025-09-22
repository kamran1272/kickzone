🏆 KickZone – Sports Management System
<p align="center"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> </p>
📖 About the Project

KickZone is my final year university project built with Laravel, MySQL, and Bootstrap/Tailwind.

It is a Sports Management System that helps manage:

🏅 Sports – create, update, and categorize sports.

👥 Users – players, admins, coaches, and general users.

🧑‍🤝‍🧑 Players – detailed profiles with team, stats, and images.

📅 Fixtures – upcoming matches and schedules.

📊 Dashboard – admin view with statistics, reports, and quick actions.

🚀 Features

✅ Admin & User login (with middleware for access control).

✅ Player management (CRUD with photo upload).

✅ Fixture scheduling and upcoming match calendar.

✅ Admin dashboard with charts and stats.

✅ Contact form → Admin dashboard messages.

✅ Image storage using Laravel’s filesystem (storage/app/public).

🛠️ Tech Stack

Backend: Laravel 12 (PHP 8.2)

Database: MySQL

Frontend: Bootstrap 5 + TailwindCSS

Auth: Laravel Breeze + Custom Admin Middleware

Charts: Chart.js

IDE Used: Visual Studio Code

⚡ Getting Started in VS Code

Clone the Repository

git clone https://github.com/YOUR-USERNAME/kickzone.git
cd kickzone


Open in VS Code

code .


Install Dependencies

composer install
npm install && npm run dev


Setup Environment
Copy .env.example → .env and configure your DB connection:

cp .env.example .env
php artisan key:generate


Run Migrations & Seed Admin User

php artisan migrate --seed


Default admin credentials:

Email:    admin123@gmail.com  
Password: admin123  


Link Storage for Player Photos

php artisan storage:link


Run the Application

php artisan serve


Visit: 👉 http://127.0.0.1:8000

📸 Screenshots
🔑 Login Page

🏟️ Admin Dashboard

👤 Player Management

👨‍💻 Author

Kamran Khan

🎓 Computer Science Student (Final Year)

💻 Full-Stack Developer (Laravel + React.js)

🌍 Based in Pakistan

📜 License

This project is open-sourced under the MIT License
.