#!/bin/bash
set -e

cd /var/www/html

# Generar .env si no existe
cat > .env << EOF
APP_NAME=Huellitas
APP_ENV=production
APP_DEBUG=false
APP_URL=${APP_URL}
APP_KEY=${APP_KEY}
DB_CONNECTION=mysql
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}
SESSION_DRIVER=database
CACHE_STORE=database
EOF

# Limpiar y cachear configuracion
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Correr migraciones
php artisan migrate --force

# Iniciar Apache
apache2-foreground