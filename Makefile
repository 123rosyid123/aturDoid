# Makefile untuk Docker Operations

.PHONY: help start stop restart build logs shell artisan composer npm test migrate fresh seed cache-clear setup down ps db

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Available targets:'
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}'

start: ## Start all containers
	docker-compose up -d
	@echo "Containers started! Access: http://localhost:8000"

stop: ## Stop all containers
	docker-compose stop

restart: ## Restart all containers
	docker-compose restart

build: ## Build containers
	docker-compose build --no-cache

logs: ## View logs (tail -f)
	docker-compose logs -f

shell: ## Enter app container shell
	docker-compose exec app bash

artisan: ## Run artisan command (e.g., make artisan cmd="migrate")
	docker-compose exec app php artisan $(cmd)

composer: ## Run composer command (e.g., make composer cmd="install")
	docker-compose exec app composer $(cmd)

npm: ## Run npm command (e.g., make npm cmd="run build")
	docker-compose exec app npm $(cmd)

test: ## Run PHPUnit tests
	docker-compose exec app php artisan test

migrate: ## Run database migrations
	docker-compose exec app php artisan migrate

fresh: ## Fresh migration with seed
	docker-compose exec app php artisan migrate:fresh --seed

seed: ## Run database seeders
	docker-compose exec app php artisan db:seed

cache-clear: ## Clear all caches
	docker-compose exec app php artisan optimize:clear

setup: ## Initial setup (install deps, migrate, build)
	@echo "Building containers..."
	docker-compose build
	@echo "Starting containers..."
	docker-compose up -d
	@echo "Installing Composer dependencies..."
	docker-compose exec app composer install
	@echo "Installing NPM dependencies..."
	docker-compose exec app npm install
	@echo "Generating application key..."
	docker-compose exec app php artisan key:generate
	@echo "Running migrations..."
	docker-compose exec app php artisan migrate
	@echo "Building assets..."
	docker-compose exec app npm run build
	@echo "Setting permissions..."
	docker-compose exec app chown -R www-data:www-data /var/www/html/storage
	docker-compose exec app chmod -R 755 /var/www/html/storage
	docker-compose exec app chmod -R 755 /var/www/html/bootstrap/cache
	@echo "Setup complete! Access: http://localhost:8000"

down: ## Stop and remove containers
	docker-compose down

ps: ## Show container status
	docker-compose ps

db: ## Connect to database
	docker-compose exec db mysql -u root -pbismillah aturdoit

dev: ## Start development mode with hot reload
	docker-compose up -d
	docker-compose exec node npm run dev
