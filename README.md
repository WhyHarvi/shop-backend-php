
# 📦 PHP MySQL API – Group 2

This project provides the backend for a simple e-commerce/storefront system using **PHP**, **MySQL**, and **Postman** for API testing. It includes features such as user management, product listing, cart functionality, orders, and product comments.

---

## 🗂️ Project Structure

```
project-root/
├── api/                 # API endpoints (e.g., products.php, users.php)
├── database/
│   ├── db.php           # Reusable MySQL connection file
│   └── create_tables.php # One-time setup script (creates DB, tables, seed data)
├── postman/             # Postman test collection and screenshots
├── .gitignore
└── README.md
```

---

## ⚙️ Setup Instructions

### 🛠️ Step 1: Run Local Server
Make sure **XAMPP** (or equivalent Apache/PHP/MySQL stack) is installed and running:
- Start **Apache** and **MySQL**
- Place the project folder inside `htdocs/`

### 🛠️ Step 2: One-Time Database Setup

Run the setup script to create the database and insert sample data.

📌 In your browser, go to:
```
http://localhost/your-project/database/create_tables.php
```

✅ This will:
- Create the `project_store` database
- Create all required tables
- Insert sample users, products, cart entries, orders, and comments
- **Automatically skip re-running if setup is already done**

---

## 🧪 API Testing

Use **Postman** to test the API.

- Test login, product listing, add to cart, comment, order, etc.
- Set `Content-Type: application/json` in headers
- Example request bodies are in the Postman collection (`/postman` folder)

---

## 👥 Sample Users

| Username | Email                | Password     |
|----------|----------------------|--------------|
| harvi    | harvi@example.com    | hashedpass1  |
| jieliang | jieliang@example.com | hashedpass2  |
| joban    | joban@example.com    | hashedpass3  |

*(Note: Passwords are placeholders – no hashing used in seed data)*

---

## 🚫 Important Notes

- `create_tables.php` will automatically **abort if already run** to prevent duplication
- You can delete or disable the script after the initial run
- Use `db.php` in all API files to connect to the database

---

## 🧾 License


---

## ✍️ Contributors

- Harvinder Singh  
- Jieliang  Xu
- Jobanpreet Singh
