# Password Sharing Tool
## Description

This secure password sharing tool allows users to generate unique links with customizable expiry dates and view limits. Passwords are stored encrypted and decrypted only upon link access, ensuring security for shared credentials

## Features
- Unique Links: Generate distinct links for each shared password.
- Customizable Expiry Dates: Set expiration dates to control link accessibility.
- Viewing Limits: Configure limits on the number of views for enhanced security.
- Secure Encryption: Passwords are stored securely in an encrypted format.
- On-Demand Decryption: Decrypt passwords only when accessing the generated links.

## Technologies
- **[Laravel](https://laravel.com/)**: an open-source PHP web application framework for building web applications
- **[Tailwind CSS](https://tailwindcss.com/)**: a CSS framework that simplifies styling by offering a set of low-level utility classes for building responsive and customizable user interfaces.
- **[Tailwind Elements](https://tailwindelements.com/)**:  a collection of pre-designed components built on top of Tailwind CSS, providing a foundation for quickly structuring and styling frontend elements in web development.
- **[MySQL](https://www.mysql.com/)**: an open-source relational database management system.

## Getting Started

### Prerequisites

Ensure you have [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/) installed on your system.

### Running the project with Laravel Sail

Follow these steps to get the project up and running using Docker:

#### 1. Clone the Repository and navigate to the Project Directory:

```bash
git clone https://github.com/freekvlier/password-sharing-tool.git && cd password-sharing-tool
```

#### 2. Copy Environment File:

```bash
cp .env.example .env
```

#### 3. Installing Composer Dependencies
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
This command uses a small Docker container containing PHP and Composer to install the application's dependencies

#### 3. Build and Start the Docker Containers:

```bash
./vendor/bin/sail up -d
```

#### 4. Run Database Migrations:
```bash
./vendor/bin/sail artisan migrate
```

#### 5. Access the Application:
Visit http://localhost in your browser.