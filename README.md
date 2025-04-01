## Install

1. Git clone
```
git clone https://github.com/SynergyTim/helpdesk.git
```

2. Masuk direktori :
```
cd helpdesk
```

3. Install package bawahan Laravel :
```
composer install
```

4. Copy .env.example ke .env :
```
copy .env.example .env
```

5. Generate key :
```
php artisan key:generate
```

6. Buka .env lalu ubah konfigurasi database sesuai yang ingin dipakai :
```
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=
```

7. Migrate database :
```
php artisan migrate
```

8. Jalankan :
```
php artisan serve
```
