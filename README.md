# Institutional Library Management System (ITSAT)

A robust web-based platform designed to automate library workflows, focusing on inventory control and streamlined loan processing. This system was developed to solve real-world administrative challenges within an institutional environment using a modular **MVC (Model-View-Controller)** architecture.

## 🛠️ Tech Stack

* **Backend:** PHP (Native MVC Architecture).
* **Database:** MySQL (Relational schema with institutional student integration).
* **Frontend:** Bootstrap 5, JavaScript, and CSS3.
* **Interactivity:** **AJAX** (for real-time data fetching without page reloads).
* **Reporting:** Excel Export Integration.

## 🚀 Key Features

* **Role-Based Access Control (RBAC):** * **Administrators:** Full access to CRUD operations for books, loans, and user management.
    * **Users:** Restricted access to view book availability and personal loan history.
* **Smart Loan Automation:** * Optimized loan creation by integrating with the **Institutional Student Database**.
    * Inputting a **Student Control Number** triggers an **AJAX** request that automatically populates the student's profile (Name, Career, etc.), drastically reducing manual entry errors.
* **Inventory Management:** Complete CRUD system for book tracking, including search-by-name filters and real-time availability status.
* **Data Portability:** Feature-rich module to export library records and loan templates directly to **Excel** for administrative reporting.
* **Secure Authentication:** Centralized login system with session management to enforce role-specific permissions.

## ⚙️ Architecture Highlights

The project follows a strict **MVC pattern** to ensure:
* **Scalability:** Easy to add new modules like "Fine Management" or "Digital Reservations."
* **Maintainability:** Separation of business logic (Models) from the user interface (Views).
* **Efficiency:** Optimized SQL queries to handle large institutional student datasets.

---
*Note: This system was developed as a solution for the ITSAT university library, prioritizing speed and data integrity.*
