#!/bin/bash

# ============================================
# Setup SSL Certificate dengan Let's Encrypt
# (Optional - untuk HTTPS gratis)
# ============================================

set -e

echo "🔒 Setting up SSL certificate with Let's Encrypt..."

# Install Certbot
echo "📦 Installing Certbot..."
sudo apt install -y certbot python3-certbot-nginx

# Get domain from user
read -p "Enter your domain name (e.g., kasir.yourdomain.com): " DOMAIN

if [ -z "$DOMAIN" ]; then
    echo "❌ Domain name is required!"
    exit 1
fi

# Update Nginx config with domain
echo "📝 Updating Nginx configuration..."
sudo sed -i "s/your-domain.com/$DOMAIN/g" /etc/nginx/sites-available/kasir-hadida

# Test Nginx config
sudo nginx -t

# Reload Nginx
sudo systemctl reload nginx

# Obtain SSL certificate
echo "🎫 Obtaining SSL certificate for $DOMAIN..."
sudo certbot --nginx -d $DOMAIN --non-interactive --agree-tos --email your-email@example.com --redirect

echo "✅ SSL certificate installed successfully!"
echo ""
echo "Your site is now available at: https://$DOMAIN"
echo "Certificate will auto-renew. Test renewal with: sudo certbot renew --dry-run"
