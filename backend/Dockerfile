FROM php:8.2-apache

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Set Apache DocumentRoot to Laravel's public folder
RUN sed -i -e 's#DocumentRoot /var/www/html#DocumentRoot /app/public#' /etc/apache2/sites-available/000-default.conf

# Enable mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Allow access to /app/public
RUN echo '<Directory /app/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf


# Allow .htaccess to override configs
RUN sed -i -e '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Add Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

# ✅ Fix permissions
RUN chown -R www-data:www-data /app \
 && chmod -R 755 /app

RUN composer install --no-scripts --no-plugins --no-dev

EXPOSE 80

CMD ["apache2-foreground"]
