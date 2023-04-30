FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && \
    apt-get install -y git zip unzip libpq-dev libonig-dev libcurl4-gnutls-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.2.6

# Copy the Laravel application code to the container
COPY . .

# Expose port 9000 and start Laravel project
CMD ["php", "euprava-mup/artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]

# Set environment variables for database connection
ENV DB_CONNECTION=mysql
ENV DB_HOST=euprava_mup_db
ENV DB_PORT=3306
ENV DB_DATABASE=euprava-mup
ENV DB_USERNAME=root
ENV DB_PASSWORD=root
