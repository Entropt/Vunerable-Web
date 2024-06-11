# Use the official PHP 7.4 image as the base image
FROM php:7.4-cli

# Set the working directory to /var/www/vunerable-web
WORKDIR /var/www/vunerable-web

# Install any additional PHP extensions or dependencies if needed
# For example, to install the PHP XML extension:
# RUN docker-php-ext-install xml

# Copy your PHP application code into the container
COPY . .

# Set any environment variables or run any additional commands if needed

# Define the command to run when the container starts
CMD ["php", "docker"]