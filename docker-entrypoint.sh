#!/bin/bash
set -e

cd /var/www/html

cat > .env << 'ENVEOF'
APP_NAME=Huellitas
APP_ENV=production
APP_DEBUG=false
APP_URL=https://huellitas-wm7q.onrender.com
APP_KEY=base64:g/WBBjZRYA5f4j4dSCQF2hzM7fS7UDqIOb9Cb3LKB5A=
DB_CONNECTION=mysql
DB_HOST=shinkansen.proxy.rlwy.net
DB_PORT=29033
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=GirRqzhJmtDNwoGhYaGwNrWhYHUhvOrO
SESSION_DRIVER=database
CACHE_STORE=database
ENVEOF

php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan db:seed --class=RoleSeeder --no-interaction 2>/dev/null || true
php artisan db:seed --class=AdminSeeder --no-interaction 2>/dev/null || true
php artisan storage:link 2>/dev/null || true

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

exec apache2-foreground