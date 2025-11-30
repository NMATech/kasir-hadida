#!/bin/bash

# ============================================
# Application Installation Script
# Run this after cloning the repository
# ============================================

set -e

echo "🚀 Installing Kasir Hadida application..."

# Check if we're in the right directory
if [ ! -f "spark" ]; then
    echo "❌ Error: Please run this script from the project root directory"
    exit 1
fi

# Install PHP dependencies
echo "📦 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
echo "🎨 Building frontend assets..."
npm ci
npm run build

# Copy environment file if not exists
if [ ! -f ".env" ]; then
    echo "📝 Creating .env file..."
    cp .env .env.backup 2>/dev/null || true
    
    # Update .env for production
    sed -i 's/CI_ENVIRONMENT = development/CI_ENVIRONMENT = production/' .env
    sed -i 's/database.default.database = kasir-hadida/database.default.database = kasir_hadida/' .env
    sed -i 's/database.default.username = root/database.default.username = kasir/' .env
    sed -i 's/database.default.password =/database.default.password = kasir_password_123/' .env
    
    echo "⚠️  Please update your .env file with correct database credentials!"
fi

# Set correct permissions
echo "🔐 Setting file permissions..."
sudo chown -R www-data:www-data /var/www/kasir-hadida
sudo chmod -R 755 /var/www/kasir-hadida
sudo chmod -R 775 /var/www/kasir-hadida/writable
sudo chmod 660 /var/www/kasir-hadida/.env

# Run migrations (if any)
echo "🗄️  Running database migrations..."
php spark migrate || echo "⚠️  No migrations to run or migration failed"

echo "✅ Application installation completed!"
echo ""
echo "Next steps:"
echo "1. Update .env file: nano /var/www/kasir-hadida/.env"
echo "2. Setup Nginx: sudo cp deploy/nginx-kasir.conf /etc/nginx/sites-available/kasir-hadida"
echo "3. Enable site: sudo ln -s /etc/nginx/sites-available/kasir-hadida /etc/nginx/sites-enabled/"
echo "4. Test config: sudo nginx -t"
echo "5. Restart Nginx: sudo systemctl restart nginx"
