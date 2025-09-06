#!/bin/sh
set -e

# Check if $UID and $GID are set, else fallback to default (1000:1000)
USER_ID=${UID:-1000}
GROUP_ID=${GID:-1000}

# Fix file ownership and permissions using the passed UID and GID
echo "Fixing file permissions with UID=${USER_ID} and GID=${GROUP_ID}..."
chown -R ${USER_ID}:${GROUP_ID} /var/www/html || echo "Some files could not be changed"

# run database migrations
echo "Running database migrations..."
#php artisan migrate --force

# Seed the database with initial data
echo "Seeding the database..."
#php artisan db:seed --force


# Clear configurations to avoid caching issues in development
echo "Clearing configurations..."
php artisan config:clear
php artisan route:clear
php artisan view:clear



# Run the default command (e.g., php-fpm or bash)
exec "$@"