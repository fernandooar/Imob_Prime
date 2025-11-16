# Dockerfile
# Usa a imagem PHP oficial (php-fpm)
FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    # Instala extensões cruciais para Laravel
    && docker-php-ext-install pdo_mysql bcmath opcache sockets zip mbstring \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && rm -rf /var/lib/apt/lists/*

# Instala o Composer globalmente (Multi-stage build)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Copia as configurações locais do PHP
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini
# Define o diretório de trabalho principal
WORKDIR /var/www/html

# Expõe a porta do PHP-FPM
EXPOSE 9000

# O comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]