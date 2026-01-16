# 🍽️ Food Comparison App

An application that allows users to **compare different types of foods and dishes**, displaying the **nutritional values and nutrients** that each item provides.  
The dishes and their data are retrieved from a **local MySQL database**.  
The project is built using **PHP**, **MySQL**, and **JavaScript**.

---

## 📌 Main Features

- 🔍 **Compare two foods or dishes side-by-side**  
- 📊 **Displays nutritional information**, such as:
  - Calories  
  - Proteins  
  - Carbohydrates
  - 
- 🗄️ **Local MySQL database** for storing and managing food data  
- ⚡ **Asynchronous requests** for quick comparisons  
- 🖥️ **Clean and responsive interface**  
- 🧩 Modular JavaScript for interactive UI behavior  

---

## 🛠️ Technologies Used

### **Backend**
- PHP 8.2 (Apache)
- MariaDB 10.11

### **Frontend**
- JavaScript (Vanilla)
- HTML5 / CSS3
- Chart.js (for data visualization)

---

## 🚀 Getting Started (Docker)

This project is fully containerized. To get started, you only need to have **Docker** and **Docker Compose** installed.

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd PHP_Comparador
   ```

2. **Start the application**:
   ```bash
   docker-compose up -d
   ```

3. **Access the App**:
   - Web App: [http://localhost:8080](http://localhost:8080)
   - phpMyAdmin (Database Manager): [http://localhost:8081](http://localhost:8081)
     - **Server**: `db`
     - **User**: `root`
     - **Password**: `root`

### **Default Credentials**:
- **Admin User**: `admin`
- **Admin Password**: `admin`

The database is **automatically initialized** with sample foods and categories upon the first run.
