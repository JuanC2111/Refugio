#!/bin/bash
set -e

cd /var/www/html

# Generar .env
cat > .env << EOF
APP_NAME=Huellitas
APP_ENV=production
APP_DEBUG=false
APP_URL=${APP_URL:-https://refugio-production-b64d.up.railway.app}
APP_KEY=${APP_KEY}
DB_CONNECTION=mysql
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT:-3306}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}
SESSION_DRIVER=database
CACHE_STORE=database
EOF

# Permisos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpiar y cachear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migraciones
php artisan migrate --force

# Iniciar Apache
exec apache2-foreground