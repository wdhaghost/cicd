# Use the official PHP 8.1 image as the base image
FROM php:8.2

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
RUN apt-get install -y npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the Laravel project files to the container
COPY . .

# Install Laravel dependencies
RUN composer install --no-interaction --no-scripts --no-progress --prefer-dist

# Set environment variables
ENV APP_NAME="Laravel App"
ENV APP_ENV="production"
ENV APP_KEY=""
ENV APP_DEBUG="true"
ENV APP_URL="http://localhost"

# Run npm install and npm run build
RUN npm install
RUN npm run build

# Expose port 80 and start the PHP built-in server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]