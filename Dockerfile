FROM broadstonebrady/php:7.2-alpine

# Copy over the composer files for installing deps
COPY composer.json /var/www/html
COPY composer.lock /var/www/html

# Set our current DIR
WORKDIR /var/www/html

# Add Git
RUN apk add git

# Copy all files (vendor/ is ignored)
COPY . .

# Install deps
RUN composer global require hirak/prestissimo
RUN composer install --ignore-platform-reqs

# Expose the development port
EXPOSE 8000

# Run development environment
CMD ["php artisan serve --host=0.0.0.0"]
