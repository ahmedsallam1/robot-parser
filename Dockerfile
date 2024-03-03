# Use an official PHP image as base
FROM php:8.1-cli

# Install system dependencies
RUN apt-get update \
    && apt-get install -y \
        libxml2-dev \
        zip \
        unzip \
        git \
    && rm -rf /var/lib/apt/lists/*

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set up the working directory
WORKDIR /app

# Copy the application files into the container
COPY . .

# Install dependencies using Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction
