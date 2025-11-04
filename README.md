# AturDOit - Platform Finansial Digital

Platform finansial digital yang menyediakan tools manajemen keuangan, edukasi finansial, dan sistem afiliasi.

## 🐳 Docker Setup (Recommended)

Project ini sudah di-dockerize untuk memudahkan development dan deployment. Lihat [DOCKER.md](DOCKER.md) untuk dokumentasi lengkap.

### Quick Start dengan Docker

1. **Clone repository dan masuk ke direktori**
   ```bash
   git clone <repository-url>
   cd aturdoid
   ```

2. **Setup environment file**
   ```bash
   cp .env.docker .env
   ```

3. **Jalankan initial setup**
   ```bash
   ./docker.sh setup
   ```

4. **Akses aplikasi**
   - **Web Application**: http://localhost:8000
   - **Vite Dev Server**: http://localhost:5173
   - **MySQL Database**: localhost:3307
   - **Redis**: localhost:6380

### Docker Commands

```bash
# Start containers
./docker.sh start

# Stop containers
./docker.sh stop

# View logs
./docker.sh logs

# Enter app container
./docker.sh shell

# Run artisan commands
./docker.sh artisan migrate
./docker.sh artisan db:seed

# Run composer
./docker.sh composer install

# Run npm
./docker.sh npm run dev

# Clear cache
./docker.sh cache-clear
```

## 📦 Manual Installation (Tanpa Docker)

Jika tidak menggunakan Docker, ikuti langkah berikut:

### Requirements
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL 8.0+
- Redis (optional)

### Installation Steps

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure database di `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=aturdoit
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

4. **Run migrations**
   ```bash
   php artisan migrate
   ```

5. **Build assets**
   ```bash
   npm run build
   # Atau untuk development
   npm run dev
   ```

6. **Start server**
   ```bash
   php artisan serve
   ```

## 🚀 Features

- **Smart Financial Tools** - Tools untuk manajemen keuangan pribadi
- **Edukasi Finansial** - Konten pembelajaran finansial
- **Sistem Afiliasi** - Program referral dengan rewards
- **Platform Advisor** - Konsultasi dengan advisor profesional
- **Community** - Networking dengan pengguna lain
- **Google OAuth** - Login dengan Google

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2)
- **Frontend**: Blade Templates, Alpine.js, Tailwind CSS
- **Database**: MySQL 8.0
- **Cache**: Redis
- **Build Tool**: Vite
- **Containerization**: Docker & Docker Compose

## 📚 Documentation

- [Docker Setup Guide](DOCKER.md)
- [AturDOit Project Info](README-aturdoit.md)
- [Google OAuth Setup](GOOGLE_OAUTH_SETUP.md)

## 🔧 Development

### Running Tests
```bash
# Dengan Docker
./docker.sh test

# Tanpa Docker
php artisan test
```

### Code Quality
```bash
# Format code dengan Pint
composer pint

# Run static analysis
composer analyse
```

## 📁 Project Structure

```
aturdoid/
├── app/                    # Application code
├── docker/                 # Docker configuration files
│   ├── nginx/             # Nginx configuration
│   ├── php/               # PHP configuration
│   └── mysql/             # MySQL configuration
├── resources/
│   ├── views/             # Blade templates
│   ├── js/                # JavaScript files
│   └── css/               # CSS files
├── routes/                # Route definitions
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── docker-compose.yml     # Docker Compose configuration
├── Dockerfile            # Docker image definition
└── docker.sh             # Docker helper script
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the MIT license.

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
