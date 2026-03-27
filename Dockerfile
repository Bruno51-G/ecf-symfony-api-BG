# Image de base : Apache avec PHP 8.4
FROM php:8.4-apache

# Nécessaire au bon fonctionnement de Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Port d'écoute
EXPOSE 80

# Répertoire de travail pour le script courant
WORKDIR /var/www/html

# Installation de git, unzip & zip et composer
RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    gnupg \
    unzip \
    zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Installation d'extensions PHP
RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql

# Copie le fichier de configuration d'Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Activation de modules Apache
RUN a2enmod rewrite remoteip
