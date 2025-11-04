# Docker Setup untuk AturDOit

## Prerequisites
- Docker Desktop atau Docker Engine
- Docker Compose

## Quick Start

### 1. Setup Environment
Salin file environment untuk Docker:
```bash
cp .env.docker .env
```

Atau update `.env` yang sudah ada dengan konfigurasi berikut:
```env
DB_HOST=db
REDIS_HOST=redis
```

### 2. Build dan Jalankan Container
```bash
# Build dan jalankan semua services
docker-compose up -d --build

# Atau tanpa rebuild
docker-compose up -d
```

### 3. Install Dependencies dan Setup Database
```bash
# Masuk ke container app
docker-compose exec app bash

# Install dependencies (jika belum)
composer install
npm install

# Generate application key (jika belum)
php artisan key:generate

# Run migrations
php artisan migrate

# Build assets (jika belum)
npm run build

# Exit dari container
exit
```

## Services

### Aplikasi Laravel
- **URL**: http://localhost:8000
- **Container**: `aturdoit-app`
- **Port**: 9000 (PHP-FPM)

### Nginx Web Server
- **Container**: `aturdoit-nginx`
- **Port**: 8000 (Host) → 80 (Container)

### MySQL Database
- **Container**: `aturdoit-db`
- **Host**: localhost
- **Port**: 3307 (Host) → 3306 (Container)
- **Database**: aturdoit
- **Username**: root
- **Password**: bismillah

### Redis Cache
- **Container**: `aturdoit-redis`
- **Port**: 6380 (Host) → 6379 (Container)

### Node.js Development Server (Vite)
- **Container**: `aturdoit-node`
- **URL**: http://localhost:5173
- **Port**: 5173

## Perintah Berguna

### Melihat Status Container
```bash
docker-compose ps
```

### Melihat Logs
```bash
# Semua services
docker-compose logs -f

# Service tertentu
docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f db
```

### Masuk ke Container
```bash
# App container
docker-compose exec app bash

# Database container
docker-compose exec db bash

# Nginx container
docker-compose exec nginx sh
```

### Jalankan Artisan Commands
```bash
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:list
```

### Jalankan Composer Commands
```bash
docker-compose exec app composer install
docker-compose exec app composer update
docker-compose exec app composer dump-autoload
```

### Jalankan NPM Commands
```bash
# Via node container
docker-compose exec node npm install
docker-compose exec node npm run dev
docker-compose exec node npm run build

# Atau via app container
docker-compose exec app npm install
docker-compose exec app npm run build
```

### Stop Container
```bash
# Stop semua container
docker-compose down

# Stop dan hapus volumes
docker-compose down -v

# Stop dan hapus images
docker-compose down --rmi all
```

### Restart Services
```bash
# Restart semua
docker-compose restart

# Restart service tertentu
docker-compose restart app
docker-compose restart nginx
```

## Development Workflow

### 1. Mode Development dengan Hot Reload
```bash
# Start semua services
docker-compose up -d

# Start Vite dev server (di terminal terpisah)
docker-compose exec node npm run dev
```
Akses aplikasi di: http://localhost:8000
Vite HMR di: http://localhost:5173

### 2. Build Production Assets
```bash
docker-compose exec app npm run build
```

### 3. Database Operations
```bash
# Create migration
docker-compose exec app php artisan make:migration create_example_table

# Run migrations
docker-compose exec app php artisan migrate

# Rollback
docker-compose exec app php artisan migrate:rollback

# Fresh migration dengan seed
docker-compose exec app php artisan migrate:fresh --seed
```

### 4. Access MySQL Database
```bash
# Dari host machine
mysql -h 127.0.0.1 -P 3307 -u root -pbismillah aturdoit

# Atau via Docker
docker-compose exec db mysql -u root -pbismillah aturdoit
```

### 5. Clear Caches
```bash
docker-compose exec app php artisan optimize:clear
```

## Troubleshooting

### Permission Issues
```bash
# Fix storage permissions
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chmod -R 755 /var/www/html/storage
docker-compose exec app chmod -R 755 /var/www/html/bootstrap/cache
```

### Database Connection Issues
Pastikan `DB_HOST=db` di `.env` file (bukan `127.0.0.1`)

### Port Already in Use
Ubah port di `docker-compose.yml`:
```yaml
ports:
  - "8001:80"  # Ubah 8000 ke port lain
```

### Rebuild Container
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### View Container Resources
```bash
docker stats
```

## Production Deployment

Untuk production, update:
1. `.env` dengan `APP_ENV=production` dan `APP_DEBUG=false`
2. Uncomment `--no-dev` di Dockerfile untuk composer install
3. Build dengan production flag:
```bash
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --build
```

## Network Architecture

```
┌─────────────────────────────────────────┐
│           Host Machine                   │
│                                          │
│  ┌────────────────────────────────────┐ │
│  │   Docker Network (aturdoit-network)│ │
│  │                                    │ │
│  │  ┌──────────┐  ┌──────────┐      │ │
│  │  │  Nginx   │←→│   App    │      │ │
│  │  │  :8000   │  │ (PHP-FPM)│      │ │
│  │  └──────────┘  └─────┬────┘      │ │
│  │                      ↓            │ │
│  │  ┌──────────┐  ┌──────────┐      │ │
│  │  │  MySQL   │←→│  Redis   │      │ │
│  │  │  :3307   │  │  :6380   │      │ │
│  │  └──────────┘  └──────────┘      │ │
│  │                                    │ │
│  │  ┌──────────┐                     │ │
│  │  │  Node    │                     │ │
│  │  │  :5173   │                     │ │
│  │  └──────────┘                     │ │
│  └────────────────────────────────────┘ │
└─────────────────────────────────────────┘
```
