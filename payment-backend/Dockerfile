FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl unzip zip git ca-certificates gnupg lsb-release \
    libzip-dev libonig-dev libxml2-dev bash && \
    docker-php-ext-install pdo pdo_mysql zip

# Enable mod_rewrite and configure Apache
RUN a2enmod rewrite && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf && \
    sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Install nvm, Node.js LTS, corepack and yarn
ENV NVM_DIR=/root/.nvm
ENV NODE_VERSION=18.20.2
ENV PATH="$NVM_DIR/versions/node/v$NODE_VERSION/bin/:$PATH"

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash && \
    . "$NVM_DIR/nvm.sh" && \
    nvm install $NODE_VERSION && \
    nvm use $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    npm install -g corepack && \
    corepack enable && \
    corepack prepare yarn@stable --activate

# Set working dir
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install PHP dependencies
RUN composer install --no-interaction

EXPOSE 80
