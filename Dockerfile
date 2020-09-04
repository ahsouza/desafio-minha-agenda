FROM php:7.4-fpm

# Argumentos definidos em docker-compose.yml
ARG user
ARG uid

# Instalando Dependências do Sistema Linux
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpando cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalando extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Buscando Composer atualizado
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criando privilegio para usuários executar comandos composer & artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Definindo diretório para o projeto
WORKDIR /var/www

USER $user