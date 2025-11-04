#!/bin/bash

# AturDOit Docker Helper Script

# Colors
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Functions
print_help() {
    echo -e "${BLUE}AturDOit Docker Helper Script${NC}"
    echo ""
    echo "Usage: ./docker.sh [command]"
    echo ""
    echo "Commands:"
    echo "  start         - Start all containers"
    echo "  stop          - Stop all containers"
    echo "  restart       - Restart all containers"
    echo "  build         - Build containers"
    echo "  logs          - View logs (tail -f)"
    echo "  shell         - Enter app container shell"
    echo "  artisan       - Run artisan command (e.g., ./docker.sh artisan migrate)"
    echo "  composer      - Run composer command"
    echo "  npm           - Run npm command"
    echo "  test          - Run PHPUnit tests"
    echo "  migrate       - Run database migrations"
    echo "  fresh         - Fresh migration with seed"
    echo "  seed          - Run database seeders"
    echo "  cache-clear   - Clear all caches"
    echo "  setup         - Initial setup (install deps, migrate, build)"
    echo "  down          - Stop and remove containers"
    echo "  ps            - Show container status"
    echo "  db            - Connect to database"
    echo ""
}

start_containers() {
    echo -e "${GREEN}Starting containers...${NC}"
    docker-compose up -d
    echo -e "${GREEN}Containers started!${NC}"
    docker-compose ps
}

stop_containers() {
    echo -e "${YELLOW}Stopping containers...${NC}"
    docker-compose stop
    echo -e "${GREEN}Containers stopped!${NC}"
}

restart_containers() {
    echo -e "${YELLOW}Restarting containers...${NC}"
    docker-compose restart
    echo -e "${GREEN}Containers restarted!${NC}"
}

build_containers() {
    echo -e "${BLUE}Building containers...${NC}"
    docker-compose build --no-cache
    echo -e "${GREEN}Build complete!${NC}"
}

view_logs() {
    docker-compose logs -f
}

enter_shell() {
    echo -e "${BLUE}Entering app container...${NC}"
    docker-compose exec app bash
}

run_artisan() {
    echo -e "${BLUE}Running: php artisan $@${NC}"
    docker-compose exec app php artisan "$@"
}

run_composer() {
    echo -e "${BLUE}Running: composer $@${NC}"
    docker-compose exec app composer "$@"
}

run_npm() {
    echo -e "${BLUE}Running: npm $@${NC}"
    docker-compose exec app npm "$@"
}

run_tests() {
    echo -e "${BLUE}Running PHPUnit tests...${NC}"
    docker-compose exec app php artisan test
}

run_migrate() {
    echo -e "${BLUE}Running migrations...${NC}"
    docker-compose exec app php artisan migrate
}

run_fresh() {
    echo -e "${YELLOW}Running fresh migration with seed...${NC}"
    read -p "This will delete all data. Continue? (y/n) " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        docker-compose exec app php artisan migrate:fresh --seed
        echo -e "${GREEN}Fresh migration completed!${NC}"
    else
        echo -e "${YELLOW}Cancelled.${NC}"
    fi
}

run_seed() {
    echo -e "${BLUE}Running seeders...${NC}"
    docker-compose exec app php artisan db:seed
}

clear_cache() {
    echo -e "${BLUE}Clearing caches...${NC}"
    docker-compose exec app php artisan optimize:clear
    docker-compose exec app php artisan cache:clear
    docker-compose exec app php artisan config:clear
    docker-compose exec app php artisan route:clear
    docker-compose exec app php artisan view:clear
    echo -e "${GREEN}All caches cleared!${NC}"
}

initial_setup() {
    echo -e "${BLUE}Starting initial setup...${NC}"

    echo -e "${YELLOW}1. Building containers...${NC}"
    docker-compose build

    echo -e "${YELLOW}2. Starting containers...${NC}"
    docker-compose up -d

    echo -e "${YELLOW}3. Installing Composer dependencies...${NC}"
    docker-compose exec app composer install

    echo -e "${YELLOW}4. Installing NPM dependencies...${NC}"
    docker-compose exec app npm install

    echo -e "${YELLOW}5. Generating application key...${NC}"
    docker-compose exec app php artisan key:generate

    echo -e "${YELLOW}6. Running migrations...${NC}"
    docker-compose exec app php artisan migrate

    echo -e "${YELLOW}7. Building assets...${NC}"
    docker-compose exec app npm run build

    echo -e "${YELLOW}8. Setting permissions...${NC}"
    docker-compose exec app chown -R www-data:www-data /var/www/html/storage
    docker-compose exec app chmod -R 755 /var/www/html/storage
    docker-compose exec app chmod -R 755 /var/www/html/bootstrap/cache

    echo -e "${GREEN}Setup complete!${NC}"
    echo -e "${GREEN}Access application at: http://localhost:8000${NC}"
}

down_containers() {
    echo -e "${RED}Stopping and removing containers...${NC}"
    docker-compose down
    echo -e "${GREEN}Containers removed!${NC}"
}

show_status() {
    docker-compose ps
}

connect_db() {
    echo -e "${BLUE}Connecting to database...${NC}"
    docker-compose exec db mysql -u root -pbismillah aturdoit
}

# Main script
case "$1" in
    start)
        start_containers
        ;;
    stop)
        stop_containers
        ;;
    restart)
        restart_containers
        ;;
    build)
        build_containers
        ;;
    logs)
        view_logs
        ;;
    shell)
        enter_shell
        ;;
    artisan)
        shift
        run_artisan "$@"
        ;;
    composer)
        shift
        run_composer "$@"
        ;;
    npm)
        shift
        run_npm "$@"
        ;;
    test)
        run_tests
        ;;
    migrate)
        run_migrate
        ;;
    fresh)
        run_fresh
        ;;
    seed)
        run_seed
        ;;
    cache-clear)
        clear_cache
        ;;
    setup)
        initial_setup
        ;;
    down)
        down_containers
        ;;
    ps)
        show_status
        ;;
    db)
        connect_db
        ;;
    *)
        print_help
        ;;
esac
