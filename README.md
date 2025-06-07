# GC Namibia Rate Checker API

A lightweight PHP-based API system for checking service rates before bookings. Built for GC Namibia, this project is aimed at enhancing booking workflows by enabling customers or systems to query available rates in real-time before confirming a booking.

## 🚀 Features

- 💡 Check available rates for services dynamically
- 📦 Lightweight and fast PHP 8.0 backend
- 🔐 Secure endpoints for integration into booking platforms
- 📡 Designed for integration with web and mobile clients
- 🌍 Portable and easy to deploy locally or via cloud

## 📁 Project Structure

/gcnam-job-api
├── .devcontainer/ # Devcontainer configuration for GitHub Codespaces
│ └── devcontainer.json
├── api/ # Main API logic (endpoints, controllers)
├── config/ # Configuration files (DB, env settings)
├── public/ # Public directory for serving with PHP built-in server
├── .gitignore
├── composer.json # Composer dependencies (if any)
└── README.md

markdown
Copy
Edit

## 🧑‍💻 Getting Started

### Prerequisites

- PHP 8.0 or higher
- Composer (optional, if you're using dependencies)
- Git
- [Codespaces](https://github.com/features/codespaces) or local Docker if using `.devcontainer`

### Run Locally

You can run the API using the built-in PHP server:

```bash
php -S 0.0.0.0:8000 -t public
