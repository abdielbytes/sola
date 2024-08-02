# SOLA - Laravel Project

## Introduction

SOLA is a Laravel-based project designed to provide a robust and scalable application framework. This README provides instructions on how to set up and run the project on your local machine.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP >= 7.4
- Composer
- MySQL or any other supported database
- Node.js & npm
- Git

## Installation

### Step 1: Clone the Repository

Clone the project repository from GitHub to your local machine:

```bash
git clone https://github.com/yourusername/sola.git
cd sola
```

### Step 2: Install Composer Dependencies

Install the necessary PHP dependencies using Composer:

```bash
composer install
```

### Step 3: Install Node.js Dependencies

Install the required JavaScript dependencies using npm:

```bash
npm install
```

### Step 4: Environment Configuration

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Generate a new application key:

```bash
php artisan key:generate
```

### Step 5: Configure Database

Update the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sola
DB_USERNAME=root
DB_PASSWORD=password
```

### Step 6: Migrate the Database

Run the following command to migrate the database:

```bash
php artisan migrate
```

### Step 7: Seed the Database (Optional)

If you have seeders configured, you can seed the database with initial data:

```bash
php artisan db:seed
```

### Step 8: Build Assets

Compile the assets using Laravel Mix:

```bash
npm run dev
```

For production builds, use:

```bash
npm run prod
```

## Running the Application

### Step 9: Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

By default, the application will be accessible at `http://localhost:8000`.

### Step 10: Access the Application

Open your web browser and navigate to `http://localhost:8000` to see the application in action.

## Additional Commands

### Running Tests

You can run the test suite using:

```bash
php artisan test
```

### Running Queue Workers

If your application uses queues, you can run the queue worker using:

```bash
php artisan queue:work
```

### Scheduling Commands

To set up the Laravel scheduler, add the following Cron entry to your server:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Conclusion

You have successfully set up the SOLA project on your local machine. Explore the project, make modifications, and build upon this foundation. For any further questions or issues, refer to the Laravel documentation or reach out to the project maintainers.
