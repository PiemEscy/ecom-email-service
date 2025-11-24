# Email Service - E-Comm Platform

The Email Service is a microservice responsible for managing email notifications for the E-Comm Platform.

It sends order summary emails to users after successful.

---

## **Features**

- Emails the order summary to the user
- Lightweight microservice architecture

---

## **Tech Stack**

- **Backend:** Laravel 10, PHP 8.1
- **Database:** MySQL
- **Authentication:** JWT Token based

---

## **Project Setup**

### 1. Clone the repository
git clone https://github.com/PiemEscy/ecom-email-service.git

### 2. Create the database
CREATE DATABASE IF NOT EXISTS ecom_email_db;

### 3. Generate and setup env file

### 4. run the bash script for built-time installation (composer, npm, artisan migrations)
./setup.sh
