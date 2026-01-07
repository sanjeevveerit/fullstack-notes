Laravel + Vue 3 + Sanctum (Token-Based Authentication)

A modern full-stack Notes application built using Laravel (Backend API) and Vue 3 (Frontend SPA) with secure token-based authentication using Laravel Sanctum.

🚀 Features

✅ User Registration & Login (Laravel Sanctum)

🔐 Token-based API Authentication

📝 Create, Read, Update, Delete Notes

🔍 Search Notes

📄 Pagination

🔄 Protected API Routes

🌐 Vue 3 SPA Frontend

⚡ Axios API Integration

🧼 Clean API Responses using Resources


Installation & Setup 

1️⃣ Clone the Repository
git clone https://github.com/sanjeevveerit/fullstack-notes.git
cd fullstack-notes

2️⃣ Backend Setup (Laravel)
Install PHP dependencies
composer install

Create .env file
cp .env.example .env

Configure database in .env
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

Generate app key
php artisan key:generate

Run migrations
php artisan migrate

Install Sanctum using Composer & publish it then Migrate Again

3️⃣ Frontend Setup (Vue 3)

Install dependencies:

npm install

Run build:

npm run dev

4️⃣ Run the Application

php artisan serve

Visit in browser: http://127.0.0.1:8000

📌 Future Enhancements

Role-based access control

Deployment (Render / Netlify)

Better UI/UX

Unit & Feature Tests

📜 License

This project is open-source and available under the MIT License.




