# YrgoConnect

![](https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExbWdiYW51anhuamF3enRwM3c5N3lucnA0dzVycHdtZXQxYWYzZm5xNyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/lJqkyOEt8OtpQls9F7/giphy.gif)

## Overview
YrgoConnect är en webbapplikation byggd i Laravel där studenter och företag kan hitta och spara varandras profiler i syfte att hitta praktikplats/praktikanter. Applikationen innehåller en flerstegsregistrering, rollbaserade profiler och en favoritfunktion liknande "likes".

## 🚀 Funktioner
- ✅ Registrering och inloggning med Laravel Breeze
- ✅ Livewire-komponent för rollbaserad flerstegsregistrering (Student/Företag)
- ✅ Student- och företagsprofiler
- ✅ Möjlighet att lägga till och ta bort favoriter mellan studenter och företag
- ✅ Livewire-komponent för favorisering
- ✅ Adminvänlig databasstruktur

## 📚 Tekniker
- Laravel 10
- MySQL
- Laravel Breeze (autentisering)
- Livewire (favoritkomponent)
- Tailwind CSS (styling)

### 🛠️ Installation
1. Klona repot
```bash
git clone https://github.com/Johan-Hagman/YrgoConnect.git
cd YrgoConnect
```
   
2. Installera beroenden
```bash
composer install
npm install && npm run build
composer require livewire/livewire
php artisan storage:link
```

3. Skapa en .env fil
```bash
cp .env.example .env
php artisan key:generate
```
		
4. Konfigurera databas i .env-filen
```bash
DB_DATABASE=yrgoconnect
DB_USERNAME=root
DB_PASSWORD=
```

5. Kör migreringar och seeda data
```bash
php artisan:migrate fresh --seed
```

6. Starta en lokal server
```bash
php artisan serve
```

### Deployment
[!][Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F4034333c-60e9-46ac-87f7-8e1186e4d576&style=for-the-badge)](https://forge.laravel.com/servers/907431/sites/2683537)
Projektet har deployats med Laravel Forge med en Digital Ocean Server

### 📜 Licens
Projektet är licenserat under MIT License
