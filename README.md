# Project Name

This is a Laravel project that uses SQLite and Vite for asset bundling. Follow these steps to set up and run the project locally on Windows.

## Prerequisites

- [Composer](https://getcomposer.org/download/) installed
- [Node.js and npm](https://nodejs.org/en/download/) installed
- PHP installed on your machine
- Ensure ports 8000 and 5173 are available

## Installation Steps

1. **Clone the Repository**
   ```powershell
   git clone <repository-url>
   cd <repository-folder>

2. **Install PHP Dependencies**
    ```powershell
    composer install

3. **Set Up the Database**
    ```powershell
    php artisan migrate  

4. **Generate Application Key**
    ```powershell
    php artisan key:generate

5. **Link Storage**
    ```powershell
    php artisan storage:link 

6. **Install Front-End Dependencies**
    <ul>
        <li>
            Remove node_modules and package-lock.json if they exist, then clear the npm cache:

            ```powershell
            Remove-Item -Recurse -Force node_modules, package-lock.json
            npm cache clean --force```
        </li>
        <li></li>
    </ul>