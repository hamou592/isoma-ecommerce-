🛍️ Laravel E-commerce Platform

A modern, responsive e-commerce platform built with Laravel, Blade, and MySQL.
The project includes an admin panel for managing products and clients, and a public landing page to showcase products for customers.

🚀 Features

👤 Authentication System – Only admin can access the dashboard.

🛒 Product Management (CRUD) – Add, update, delete, and list products.

👥 Client Management (CRUD) – Clients are auto-added when they place a command.

💬 Commander Page – Clients can send messages/orders, which get saved to the database.

📦 Product Showcase – Products from admin panel are displayed dynamically on the landing page.

🔎 Product Filtering – Search and filter products on the landing page.

📱 Responsive Design – Works on all devices with a modern and friendly UI.

🛠️ Tech Stack

Backend: Laravel (PHP Framework)

Frontend: Blade Templates, HTML, CSS, JavaScript

Database: MySQL

Authentication: Laravel built-in auth system

📂 Project Structure
ecommerce-project/
│── app/              # Laravel app code
│── resources/views/  # Blade templates (frontend + admin panel)
│── public/           # Public assets (CSS, JS, Images)
│── routes/web.php    # Application routes
│── database/         # Migrations & seeds
│── ecommerce_db.sql  # Database backup
│── README.md         # Project documentation

📸 Screenshots

📦 Product Showcase <img width="1886" height="875" alt="image" src="https://github.com/user-attachments/assets/8d2bdba9-a683-42d4-abea-463a92d7a716" />

📄 Product Details Page <img width="1887" height="915" alt="image" src="https://github.com/user-attachments/assets/17532fe1-f608-4fce-bef2-ccd4933ff26c" />


💬 Commander Page <img width="1886" height="875" alt="image" src="https://github.com/user-attachments/assets/5a35aef6-37dd-403c-b22b-817cced30a91" />


🔑 Admin Login <img width="1110" height="660" alt="image" src="https://github.com/user-attachments/assets/db56ed82-f1a5-439b-8af1-29f985c2f158" />


📊 Admin Dashboard <img width="1893" height="888" alt="image" src="https://github.com/user-attachments/assets/ae6d44df-c8a2-4d62-ba28-fcb97b6a2fbe" />
<img width="1892" height="876" alt="image" src="https://github.com/user-attachments/assets/212ef2da-1d9a-4cce-8c61-744c2893b01f" />
<img width="1881" height="907" alt="image" src="https://github.com/user-attachments/assets/55cd4b63-3869-4a9b-a2ed-e6d9c9431b0c" />
<img width="1891" height="882" alt="image" src="https://github.com/user-attachments/assets/b9fc745a-cbba-4cee-a73e-b5f01f294f43" />


⚙️ Installation & Usage
🔽 Clone the repo
git clone [https://github.com/hamou592/laravel-ecommerce.git](https://github.com/hamou592/isoma-ecommerce-.git)

📦 Install dependencies
composer install
npm install && npm run dev

⚙️ Setup environment

Duplicate .env.example and rename to .env

cp .env.example .env


Update database credentials inside .env:

DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=

🗄️ Import database
mysql -u root -p ecommerce_db < ecommerce_db.sql

🔑 Generate app key
php artisan key:generate

🚀 Run the server
php artisan serve


Now open http://127.0.0.1:8000
 🎉

📦 Deployment

For hosting, you can use:

Shared Hosting (cPanel, etc.) – upload Laravel files and import DB.

VPS / Cloud (DigitalOcean, AWS, etc.) – set up LAMP/LEMP server.

Laravel Forge / Ploi / Heroku – one-click deployments for Laravel apps.

🔮 Future Improvements

Add online payment integration (Stripe/PayPal)

Add multi-language support (Arabic / French / English)

Add product categories & inventory management

Add order tracking system

👨‍💻 Author

Hamou Nasreddine – [GitHub Profile](https://github.com/hamou592)
