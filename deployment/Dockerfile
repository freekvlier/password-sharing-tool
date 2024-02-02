FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git curl unzip

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Install Node.js and npm
RUN apt-get install -y nodejs npm

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . .

# Install Laravel dependencies
RUN composer install --ignore-platform-reqs

# Install npm packages and run build
RUN npm install
RUN npm run build

RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

CMD ["php-fpm"]

EXPOSE 9000
