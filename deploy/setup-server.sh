#!/bin/bash

# ============================================
# Oracle Cloud Free Tier - Server Setup Script
# Untuk Ubuntu 22.04/24.04 ARM64
# ============================================

set -e

echo "🚀 Starting server setup for Kasir Hadida..."

# Update system
echo "📦 Updating system packages..."
sudo apt update
sudo apt upgrade -y

# Install Nginx
echo "🌐 Installing Nginx..."
sudo apt install -y nginx

# Install PHP 8.1 and extensions
echo "🐘 Installing PHP 8.1 and required extensions..."
sudo apt install -y php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring \
    php8.1-zip php8.1-curl php8.1-intl php8.1-gd php8.1-cli unzip git curl

# Install MySQL
echo "🗄️  Installing MySQL Server..."
sudo apt install -y mysql-server

# Secure MySQL installation
echo "🔒 Configuring MySQL..."
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'your_secure_password_here';"
sudo mysql -e "CREATE DATABASE IF NOT EXISTS kasir_hadida;"
sudo mysql -e "CREATE USER IF NOT EXISTS 'kasir'@'localhost' IDENTIFIED BY 'kasir_password_123';"
sudo mysql -e "GRANT ALL PRIVILEGES ON kasir_hadida.* TO 'kasir'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Install Composer
echo "🎼 Installing Composer..."
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer --version

# Install Node.js and npm (for building assets)
echo "📦 Installing Node.js..."
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Create project directory
echo "📁 Creating project directory..."
sudo mkdir -p /var/www/kasir-hadida
sudo chown $USER:$USER /var/www/kasir-hadida

# Configure firewall
echo "🔥 Configuring firewall..."
sudo ufw allow 22/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw --force enable

echo "✅ Server setup completed!"
echo ""
echo "Next steps:"
echo "1. Clone your repository to /var/www/kasir-hadida"
echo "2. Run: cd /var/www/kasir-hadida && bash deploy/install-app.sh"
