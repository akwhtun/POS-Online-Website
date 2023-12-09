# Laravel 9 POS Online Web Application

## Description

This web application is a responsive POS (Point of Sale) online website developed using Laravel 9, Bootstrap, jQuery, and MySQL. The system is designed to support both admin and user functionalities.

## Features

### Admin Dashboard

-   **Admin can:**
    -   login with email and password to use the system
    -   create food product
    -   view customer lists
    -   view account details of customers
    -   suspend or active customer’s account
    -   manage categories
    -   view all food product lists
    -   manage order lists of customers
    -   view contact lists of customers
    -   change role
    -   logout from the system

### Guest User Panle

-   **Guest User can:**
    -   register account

### Registered User Panel

-   **Registered User can:**
    -   login with email and password
    -   add food products to shopping cart
    -   order food products
    -   view order history
    -   check the status of ordered product
    -   contact to admin
    -   can logout from the system

## Technologies Used

-   **Laravel 9:** PHP web application framework for backend development.
-   **Bootstrap:** Frontend framework for responsive web design.
-   **jQuery:** JavaScript library for DOM manipulation and interactions.
-   **MySQL:** Database management system for storing application data.

## Setup Instructions

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/akwhtun/POS-Online-Website.git
    ```
2. **Install Dependencies:**

-   Navigate to the project directory and install Composer dependencies:

    ```bash
    composer install
    ```

3. **Copy Environment Variables:**

-   Duplicate the `.env.example` file to `.env` and set up your environment configurations:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key:**

```bash
php artisan key:generate

```

5. **Database Setup:**

-   Configure your database credentials in the .env file, then run migrations:

```bash
php artisan migrate

```

6. **Run the Application:**

```bash
php artisan serve

```

Access the application at http://localhost:8000

## Usage

### Admin:

-   **Credentials:**

    -   **Email:** admin@gmail.com
    -   **Password:** admin123

    Log in with the provided admin credentials to access admin functionalities.

### User:

-   **User Credentials:**
    -   Register an account or use provided user credentials to access user features.
