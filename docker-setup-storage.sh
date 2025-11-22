#!/bin/bash

# Docker Storage Setup Script
# This script sets up storage properly within Docker containers

echo "=========================================="
echo "  Docker Storage Setup for AturDOit"
echo "=========================================="
echo ""

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo -e "${RED}✗ Docker is not running!${NC}"
    echo "Please start Docker and try again."
    exit 1
fi

echo -e "${GREEN}✓ Docker is running${NC}"
echo ""

# Function to run command in app container
run_in_container() {
    docker exec aturdoit-app "$@"
}

# Check if container is running
if ! docker ps | grep -q aturdoit-app; then
    echo -e "${YELLOW}⚠ Container aturdoit-app is not running${NC}"
    echo "Starting containers..."
    docker-compose up -d
    echo "Waiting for containers to start..."
    sleep 5
fi

echo "Setting up storage directories in container..."
run_in_container mkdir -p storage/app/public/avatars
run_in_container mkdir -p storage/framework/cache
run_in_container mkdir -p storage/framework/sessions
run_in_container mkdir -p storage/framework/views
run_in_container mkdir -p storage/logs
run_in_container mkdir -p bootstrap/cache
echo -e "${GREEN}✓ Storage directories created${NC}"
echo ""

echo "Setting permissions..."
run_in_container chown -R www-data:www-data storage
run_in_container chown -R www-data:www-data bootstrap/cache
run_in_container chmod -R 775 storage
run_in_container chmod -R 775 bootstrap/cache
echo -e "${GREEN}✓ Permissions set${NC}"
echo ""

echo "Creating storage symlink..."
run_in_container php artisan storage:link
echo -e "${GREEN}✓ Storage symlink created${NC}"
echo ""

echo "Checking storage structure..."
run_in_container ls -la storage/app/public/
echo ""

echo "Checking public symlink..."
run_in_container ls -la public/ | grep storage
echo ""

echo "=========================================="
echo -e "${GREEN}✓ Storage setup complete!${NC}"
echo "=========================================="
echo ""
echo "Storage is now ready for:"
echo "  - Avatar uploads"
echo "  - File storage"
echo "  - Cache operations"
echo ""
echo "Next steps:"
echo "  1. Test avatar upload from profile page"
echo "  2. Check if files are persisted after container restart"
echo ""

