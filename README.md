<div align="center">

# 🔗 Lovilink

**A modern, free, and open-source URL shortening platform**

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.6-FB70A9?style=for-the-badge&logo=livewire&logoColor=white)](https://laravel-livewire.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Cursor AI](https://img.shields.io/badge/Cursor-AI-000000?style=for-the-badge&logo=cursor&logoColor=white)](https://cursor.sh)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)

*Built with ❤️ by [Tev Immanuel](https://github.com/bbensan) as part of the LovIdea creative brand*

</div>

---

## 📖 About

**Lovilink** is a beautiful, modern URL shortening service designed to help creators, communities, and individuals share their digital identity in a better way. Born from the vision of **LovIdea** — a creative brand focused on building small, artistic products — Lovilink serves as the first step toward connecting people and ideas through better links.

### ✨ Why Lovilink?

- **Free & Open Source** — Built for everyone, no hidden costs
- **Modern UI/UX** — Clean, responsive design with dark mode support
- **User-Friendly** — Simple interface for creating and managing short links
- **Privacy-Focused** — Your data, your control
- **Community-Driven** — Built with feedback and contributions in mind

---

## 🚀 Features

### Core Functionality
- 🔗 **URL Shortening** — Create short, memorable links instantly
- 📊 **Analytics Dashboard** — Track your link performance
- 🎨 **Custom Profiles** — Personalize your link pages
- 📱 **QR Code Generation** — Generate QR codes for your links
- 💬 **Feedback System** — Share your thoughts and suggestions

### Technical Features
- ⚡ **Real-time Updates** — Powered by Livewire for seamless interactions
- 🌙 **Dark Mode** — Beautiful dark theme support
- 📱 **Fully Responsive** — Works perfectly on all devices
- 🔒 **Secure** — Built with Laravel's security best practices
- 🎯 **Fast** — Optimized for performance

---

## 🛠️ Tech Stack

### Backend
- **Laravel 10.x** — Robust PHP framework
- **Livewire 3.6** — Full-stack framework for dynamic UIs
- **PostgreSQL** — Reliable database system
- **Laravel Sanctum** — API authentication

### Frontend
- **Tailwind CSS 3.4** — Utility-first CSS framework
- **Vite** — Next-generation frontend tooling
- **Livewire Flux** — Beautiful UI components
- **Axios** — HTTP client for API requests

### Additional Tools
- **Endroid QR Code** — QR code generation
- **Guzzle HTTP** — HTTP client library

---

## 📁 Project Structure

```
shortenlink/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Livewire/             # Livewire components
│   │   ├── Dashboard/        # Dashboard pages
│   │   └── Page/             # Public pages
│   ├── Models/               # Eloquent models
│   └── Policies/             # Authorization policies
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── routes/                   # Application routes
└── public/                   # Public assets
```

---

## 🎯 Pages & Routes

### Public Pages
- **Home** — Landing page with URL shortening interface
- **Features** — Platform features overview
- **About** — Project story and mission
- **Blog** — Developer journal and updates
- **Contact** — Get in touch
- **Tools** — Available tools and utilities
- **Templates** — Customizable templates
- **Feedback** — Submit feedback and suggestions
- **Privacy, Terms, Cookie Policy** — Legal pages

### Dashboard (Authenticated)
- **Home** — Main dashboard overview
- **QR Generator** — Create QR codes for links
- **Profile** — User profile management
- **Coming Soon** — Upcoming features

---

## 🗄️ Database Models

- **User** — User accounts and authentication
- **UrlStorage** — Shortened URLs and analytics
- **UserData** — Extended user information
- **Feedback** — User feedback submissions
- **Image** — Image storage and management

---

## 🎨 Design Philosophy

Lovilink is designed with simplicity and elegance in mind. The interface focuses on:

- **Clean Layouts** — Minimal clutter, maximum clarity
- **Intuitive Navigation** — Easy to find what you need
- **Consistent Theming** — Cohesive design language
- **Accessibility** — Usable by everyone
- **Performance** — Fast loading and smooth interactions

---

## 🌟 LovIdea Vision

Lovilink is the first digital product in the **LovIdea** ecosystem — a creative brand focused on building small, artistic products ranging from digital tools to physical crafts like stickers, tote bags, and 3D printed collectibles.

This project represents a commitment to:
- **Openness** — Free and accessible to all
- **Creativity** — Building beautiful, useful things
- **Connection** — Bringing people and ideas together
- **Community** — Growing together through feedback and contributions

---

## 📝 Development

### Requirements
- PHP 8.2 or higher
- PostgreSQL database
- Composer
- Node.js & npm
- Required PHP extensions (see `composer.json`)

### Quick Start

1. Clone the repository
```bash
git clone https://github.com/bbensan/shortenlink.git
cd shortenlink
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations
```bash
php artisan migrate
```

5. Start development server
```bash
composer run dev
```

---

## 🤝 Contributing

Contributions are welcome! Whether it's:
- 🐛 Bug reports
- 💡 Feature suggestions
- 📝 Documentation improvements
- 🎨 UI/UX enhancements
- 🔧 Code contributions

Every contribution helps make Lovilink better for everyone.

---

## 📄 License

This project is open-sourced software licensed under the [MIT License](LICENSE).

---

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com) — The PHP Framework for Web Artisans
- UI powered by [Livewire](https://laravel-livewire.com) and [Tailwind CSS](https://tailwindcss.com)
- QR Code generation by [Endroid QR Code](https://github.com/endroid/qr-code)
- 🤖 **Development assisted by [Cursor AI](https://cursor.sh)** — AI-powered coding companion that helped bring this project to life

---

<div align="center">

**Made with ❤️ by [Tev Immanuel](https://github.com/bbensan)**

*Part of the [LovIdea](https://github.com/bbensan) creative brand*

[⭐ Star this repo](https://github.com/bbensan/shortenlink) if you find it useful!

</div>
