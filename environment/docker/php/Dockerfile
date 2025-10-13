FROM php:8.3-fpm

WORKDIR /var/www

# 必要パッケージ
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    mariadb-client \
    vim \
    libzip-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    unzip \
 && docker-php-ext-install \
    zip \
    pdo_mysql \
    bcmath \
 && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp \
 && docker-php-ext-install -j$(nproc) gd \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && rm -rf /var/lib/apt/lists/*

# Composer のコピー
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # 先に composer install (キャッシュ効率化)
# # COPY ./docker/src/zk_sl_laravel/composer.json ./docker/src/zk_sl_laravel/composer.lock ./
# RUN composer install --no-dev --optimize-autoloader

# # アプリ本体コピー
# COPY ./docker/src/zk_sl_laravel /var/www

# 権限調整
# RUN chown -R www-data:www-data storage bootstrap/cache \
#  && chmod -R 775 storage bootstrap/cache

# Node.js は別ステージでビルド
# FROM node:22 AS node-build
# WORKDIR /app
# COPY ./docker/src/zk_sl_laravel/package*.json ./
# RUN npm install
# COPY ./docker/src/zk_sl_laravel ./
# RUN npm run build

# # Node の成果物をコピー
# FROM base AS final
# COPY --from=node-build /app/public/build /var/www/public/build

EXPOSE 9000
CMD ["php-fpm"]
