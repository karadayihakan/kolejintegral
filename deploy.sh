#!/bin/bash
# cPanel Git Auto Pull Script
# Bu script'i cPanel Cron Jobs ile çalıştırabilirsiniz

cd /home/integra2/yeni.kolejintegral.com/kolejintegral || exit 1

# Git pull yap
git pull origin main

# Composer dependencies güncelle (opsiyonel)
# /usr/local/bin/ea-php82 /usr/local/bin/composer install --no-dev --optimize-autoloader

# Migration çalıştır (opsiyonel - dikkatli kullanın)
# /usr/local/bin/ea-php82 artisan migrate --force

# Cache temizle ve yeniden oluştur
/usr/local/bin/ea-php82 artisan config:cache
/usr/local/bin/ea-php82 artisan route:cache
/usr/local/bin/ea-php82 artisan view:cache

# Permissions
chmod -R 775 storage bootstrap/cache

echo "Deploy tamamlandı: $(date)"

