# استخدم PHP 8.3
FROM php:8.3-cli

# تثبيت الأدوات المطلوبة
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip

# تثبيت امتداد zip
RUN docker-php-ext-install zip

# تثبيت Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# تحديد مجلد العمل
WORKDIR /var/www

# نسخ ملفات المشروع
COPY . .

# تثبيت مكتبات Laravel بدون dev
RUN composer install --no-dev --optimize-autoloader

# فتح البورت
EXPOSE 8000

# تشغيل Laravel
CMD php artisan serve --host=0.0.0.0 --port=$PORT
