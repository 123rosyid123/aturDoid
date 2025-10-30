# AturDOit - Landing Page

Landing page modern untuk aplikasi keuangan digital AturDOit dengan fitur lengkap.

## 🚀 Fitur

### 📱 Halaman Lengkap
- **Home**: Hero section dengan animasi chart dan statistik
- **Features**: 6 fitur unggulan dengan ikon dan deskripsi
- **Community**: Testimonial dan fitur komunitas
- **Authentication**: Register dan Login dengan multi-step process

### 🎨 Desain & UX
- **Responsive Design**: Optimal di desktop, tablet, dan mobile
- **Modern UI**: Menggunakan Tailwind CSS
- **Smooth Animations**: Scroll animations dan micro-interactions
- **Dark Mode Support**: Otomatis menyesuaikan dengan preferensi sistem
- **Accessibility**: Mendukung screen reader dan keyboard navigation

### ⚡ Teknologi
- **Frontend**: HTML5, Tailwind CSS, Vanilla JavaScript
- **Icons**: Font Awesome 6
- **Interactivity**: Alpine.js untuk state management
- **Animations**: CSS animations dan transitions

## 🛠️ Struktur Folder

```
aturdoid/
├── index.html          # Halaman utama landing page
├── styles.css          # Custom CSS styles
├── js/
│   └── auth.js         # Authentication logic
└── README.md           # Documentation
```

## 🚀 Quick Start

1. Buka `index.html` di browser:
```bash
# Menggunakan live server (recommended)
npx live-server

# Atau buka langsung di browser
open index.html
```

## 📱 Demo Credentials

Untuk testing login:
- **Email**: `demo@aturdoit.com`
- **Password**: `demo123`

## 🎨 Komponen Utama

### Navigation Bar
- Fixed positioning dengan blur effect
- Mobile responsive dengan hamburger menu
- Scroll effect untuk background

### Hero Section
- Split layout dengan content dan animated chart
- Call-to-action buttons
- Statistics cards
- Floating animation untuk chart container

### Features Grid
- 6 fitur utama dengan ikon custom
- Hover effects dengan sliding overlay
- Responsive grid layout

### Community Section
- Testimonial cards dengan rating
- Community features list
- User avatars dan quotes

### Authentication Modal
- Multi-step registration process (5 steps)
- Email verification simulation
- Google OAuth integration (UI only)
- Error handling dengan shake animation

## 🎯 Animasi & Interaksi

### Chart Animations
- Growing candlestick chart
- Floating effect untuk container
- Hover scaling untuk individual candles

### Scroll Animations
- Fade in effect untuk feature cards
- Slide up animation untuk community cards
- Intersection Observer untuk performance

### Form Interactions
- Password toggle visibility
- Input focus effects
- Button hover states dengan shine effect
- Error shake animations

## 📱 Responsive Breakpoints

- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

## 🎨 Customization

### Warna Utama
- **Primary Orange**: `#ff7b29`
- **Dark Blue**: `#1e3a8a`
- **Success Green**: `#10b981`
- **Error Red**: `#dc3545`

### Typography
- **Font Family**: System UI (default browser)
- **Headings**: Bold weights
- **Body Text**: Regular weights dengan gray variations

## 🔧 Development

### Adding New Features
1. Tambah HTML section di `index.html`
2. Style dengan Tailwind classes
3. Tambah custom styles di `styles.css` jika needed
4. Implement JavaScript logic jika required

### Modifying Colors
Edit warna di `styles.css` atau ubah Tailwind config:
```css
:root {
  --primary-orange: #ff7b29;
  --dark-blue: #1e3a8a;
}
```

## 🌐 Browser Support

- Chrome/Chromium 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## 📄 License

MIT License

---

*Dibuat dengan ❤️ menggunakan HTML5, Tailwind CSS, dan JavaScript*