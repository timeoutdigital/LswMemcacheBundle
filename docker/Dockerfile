FROM php:latest

# Install system dependencies required for memcache and general PHP needs
RUN apt-get update && apt-get install -y \
    libz-dev \
    unzip \
    git \
    zip \
    wget \
    && pecl install memcache \
    && docker-php-ext-enable memcache \
    && docker-php-ext-install pdo pdo_mysql pcntl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

#RUN mkdir -p ~/.ssh && \
#    ssh-keyscan github.com >> ~/.ssh/known_hosts

# Set working directory
WORKDIR /app

# Copy Composer from the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application code
COPY .. .

# Install PHP dependencies
RUN composer install

# Default command
CMD ["vendor/bin/phpunit"]
