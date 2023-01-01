# Project Profile Website Laravel

## Usage
- Prerequisites
    - Code Editor / IDE
    - PHP [Composer](https://getcomposer.org/download/)
    - Terminal

## Installation

1. Clone the repository
    ```bash
    git clone https://github.com/bagus-masudi/profile_website.git
    ```

2. Use the package manager [composer](https://getcomposer.org/download/) to install vendor.

    ```bash
    composer install
    ```

3. Configure .env files, => copy .env.example and rename it to .env

4. Set your database configuration in .env files

5. Generate APP_KEY

    ```bash
    php artisan key:generate
    ```

6. Run Migration

    ```bash
    php artisan migrate
    ```

7. To make uploaded files accessible from the web, you should create a symbolic link from public/storage to storage/app/public.

    ```bash
    php artisan storage:link
    ```

8. Run Laravel server

    ```bash
    php artisan serve
    ```
