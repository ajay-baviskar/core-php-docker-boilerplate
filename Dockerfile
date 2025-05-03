# Use official PHP image with Apache
FROM php:7.4-apache

# Enable PHP extensions
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite (optional but often required)
RUN a2enmod rewrite

# Copy current directory into container
COPY . /var/www/html/

# Fix ownership and permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Update Apache config to allow access
RUN echo "<Directory /var/www/html/> \n\
    Options Indexes FollowSymLinks \n\
    AllowOverride All \n\
    Require all granted \n\
</Directory>" > /etc/apache2/conf-available/custom-permission.conf \
    && a2enconf custom-permission

# Expose port 80
EXPOSE 80
