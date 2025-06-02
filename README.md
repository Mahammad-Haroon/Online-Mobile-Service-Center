# SmartRepair - Online Mobile Service Center

SmartRepair is a web-based platform designed to streamline mobile phone repair services. It connects users with nearby service centers, offering a smooth and transparent process for device repair—from request to doorstep delivery.

## 🚀 Features

### 👤 For Customers
- Register and log in to your account
- Search and view nearby mobile service centers
- Submit repair requests with device and issue details
- Track repair status in real time
- Make online or COD payments
- Rate and review service centers

### 🛠️ For Service Centers
- Register and manage profile and services offered
- View and manage repair requests
- Provide real-time status updates
- Handle pickup and delivery (optional)
- View payment and feedback details
- Access device repair history

### 🔒 For Admin
- Approve or reject user and service center registrations
- View and manage all users and service centers
- Monitor payments and customer feedback

## 🧑‍💻 Tech Stack

| Layer         | Technology        |
|---------------|-------------------|
| Frontend      | HTML, CSS, JavaScript |
| Backend       | PHP               |
| Database      | MySQL             |
| Server        | Apache            |
| IDE/Editor    | VS Code           |
| Browser       | Chrome, Firefox, IE |

## 📦 Requirements

### Hardware
- Processor: Intel i5 or better
- RAM: 8 GB or more
- Storage: 40 GB available

### Software
- OS: Windows/Linux/Mac
- Git, Apache, MySQL
- Browser: Any modern web browser

## ⚙️ Setup Instructions

1. **Clone the repo**
   ```bash
   git clone https://github.com/Mahammad-Haroon/Online-Mobile-Service-Center.git
   ```

2. **Move project to your server's root folder**
   Example for XAMPP:
   ```
   C:/xampp/htdocs/Online-Mobile-Service-Center
   ```

3. **Import the database**
   - Open **phpMyAdmin**
   - Create a new database (e.g., `smartrepair`)
   - Import the `.sql` file if available

4. **Update DB credentials** in your PHP config file (`config.php`, or similar)

5. **Start Apache and MySQL** using XAMPP or your local server

6. **Open the platform** in browser:
   ```
   http://localhost/Online-Mobile-Service-Center
   ```
