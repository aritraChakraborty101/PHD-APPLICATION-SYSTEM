# Phd Application System

This is a Laravel project that uses SQLite and Vite for asset bundling. Follow these steps to set up and run the project locally on Windows.

## Prerequisites

- [Composer](https://getcomposer.org/download/) installed
- [Node.js and npm](https://nodejs.org/en/download/) installed
- PHP installed on your machine
- Ensure ports 8000 and 5173 are available

## Installation Steps
 
 
 1. **Clone the Repository**

- Clone the repository and navigate into the project directory:

    ```sh
    git clone <repository-url>
    cd <repository-directory>
    ```

 2. **Install PHP Dependencies**

- Install the required PHP dependencies using Composer:

    ```sh
    composer install
    ```

 3. **Set Up Environment Configuration**

- Copy the `.env.example` file to `.env` and modify the necessary environment settings:

    ```sh
    cp .env.example .env
    ```

 4. **Generate Application Key**

- Generate the Laravel application key:

    ```sh
    php artisan key:generate
    ```

 5. **Run Database Migrations**

- Run the database migrations to set up the database schema:

    ```sh
    php artisan migrate
    ```

 6. **Install Front-End Dependencies**

- Remove `node_modules` and `package-lock.json` if they exist, then clear the npm cache:

    ```powershell
    Remove-Item -Recurse -Force node_modules, package-lock.json
    npm cache clean --force
    ```

- Install dependencies:

    ```powershell
    npm install
    ```

 7. **Build Assets**

- Run a production build to generate assets in `public/build`:

    ```powershell
    npm run build
    ```

 8. **Set APP_URL in Environment File**

- Open the `.env` file and ensure the `APP_URL` is set as follows:

    ```plaintext
    APP_URL=http://localhost
    ```

 9. **Clear Laravel Caches**

- Clear Laravel caches to ensure configuration is up-to-date:

    ```powershell
    php artisan config:clear
    php artisan view:clear
    php artisan route:clear
    php artisan cache:clear
    ```

 10. **Start the Laravel Development Server**

- Start the Laravel development server and open your application:

    ```sh
    php artisan serve
    ```

- In a new terminal, start Vite’s development server:
    ```sh
    npm run dev
    ```
