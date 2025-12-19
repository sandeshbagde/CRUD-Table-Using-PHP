# PHP CRUD Application

A simple and modern PHP CRUD (Create, Read, Update, Delete) application built using PHP (PDO) and MySQL.  
This project was developed as part of an internship assignment to demonstrate backend CRUD operations, database handling, and basic frontend design.

---

## 🚀 Features

- Create, Read, Update, Delete (CRUD) products
- PHP PDO for secure database access
- MySQL database integration
- Responsive UI using Bootstrap
- Category-wise product visualization using Chart.js
- Export product data to CSV
- Clean and modular folder structure

---

## 🗂️ Project Folder Structure

php-crud-app/
│
├── config/
│ └── db.php
│
├── public/
│ ├── index.php
│ ├── create.php
│ ├── edit.php
│ ├── delete.php
│ └── export_csv.php
│
├── includes/
│ ├── header.php
│ └── footer.php
│
├── assets/
│ └── css/
│ └── style.css
│
├── sql/
│ └── database.sql
│
└── README.md


---

## 🛠️ Technologies Used

- PHP (PDO)
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- Chart.js
- XAMPP / WAMP

---

## 🗄️ Database Structure

**Database Name:** `crud_app`

**Table:** `products`

| Column | Type |
|------|------|
| id | INT (Primary Key, Auto Increment) |
| name | VARCHAR(100) |
| price | DECIMAL(10,2) |
| category | VARCHAR(100) |
| created_at | TIMESTAMP |

---

## ⚙️ How to Run the Project

### 1. Install XAMPP
Download and install XAMPP from:  
https://www.apachefriends.org

### 2. Start Apache and MySQL
Open XAMPP Control Panel and start:
- Apache
- MySQL

### 3. Place Project in htdocs
C:\xampp\htdocs\

### 4. Create Database
Open browser and go to: http://localhost/phpmyadmin