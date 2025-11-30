#!/bin/bash

# ============================================
# Quick Deploy Script
# Untuk update aplikasi tanpa setup ulang
# ============================================

set -e

echo "🚀 Deploying updates..."

cd /var/www/kasir-hadida

# Pull latest changes
echo "📥 Pulling latest code..."
git pull origin main

# Install/update dependencies
echo "📦 Updating dependencies..."
composer install --no-dev --optimize-autoloader

# Build assets
echo "🎨 Building assets..."
npm ci
npm run build

# Clear cache
echo "🧹 Clearing cache..."
php spark cache:clear

# Run migrations
echo "🗄️  Running migrations..."
php spark migrate || echo "⚠️  No new migrations"

# Fix permissions
echo "🔐 Fixing permissions..."
sudo chown -R www-data:www-data /var/www/kasir-hadida
sudo chmod -R 755 /var/www/kasir-hadida
sudo chmod -R 775 /var/www/kasir-hadida/writable

# Restart services
echo "🔄 Restarting services..."
sudo systemctl restart php8.1-fpm
sudo systemctl reload nginx

echo "✅ Deployment completed!"
echo ""
echo "🌐 Check your site: $(grep app.baseURL .env | cut -d"'" -f2)"
