FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl unzip zip git ca-certificates gnupg lsb-release \
    libzip-dev libonig-dev libxml2-dev bash && \
    docker-php-ext-install pdo pdo_mysql zip

# Install nvm, Node.js LTS 18, corepack + yarn
ENV NVM_DIR=/root/.nvm
ENV NODE_VERSION=18.20.2

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash && \
    . "$NVM_DIR/nvm.sh" && \
    nvm install $NODE_VERSION && \
    nvm use $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    npm install -g corepack && \
    corepack enable && \
    corepack prepare yarn@stable --activate

# Make Node, npm, yarn and corepack available globally (non-login shells)
ENV PATH="$NVM_DIR/versions/node/v$NODE_VERSION/bin/:$PATH"

# Set working dir
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install PHP dependencies
RUN composer install --no-interaction

# Apache to serve /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
